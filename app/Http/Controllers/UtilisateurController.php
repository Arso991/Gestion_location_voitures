<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UtilisateurController extends Controller
{
    public function register() 
    {
        return view('register');
    }

    public function login() 
    {
        return view('login');
    }

    public function traitementLogin(Request $request) 
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Tentative de connexion
        // Récupérer l'utilisateur correspondant à l'adresse e-mail fournie
        $utilisateur = Utilisateur::where('email', $request->email)->first();

        // Vérifier si l'utilisateur existe et si le mot de passe correspond
        if ($utilisateur && password_verify($request->password, $utilisateur->password)) {
            // La connexion a réussi, connectez l'utilisateur manuellement
            Auth::login($utilisateur);

            // Mettez l'utilisateur dans la session
            $request->session()->put('utilisateur', $utilisateur);

            // Redirigez où vous le souhaitez
            return redirect('/');
        }

        // La connexion a échoué, renvoyez un message d'erreur personnalisé
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Adresse e-mail ou mot de passe incorrect.');
    }

    public function traitementRegister(Request $request) 
    {
        // Valider les données du formulaire d'inscription
        $this->validate($request, [
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs',
            'password' => 'required|string|min:6',
        ]);

        // Créer un nouvel utilisateur
        $Utilisateur = Utilisateur::create([
            'nom' => $request->lastname,
            'prenom' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $url = URL::temporarySignedRoute(
            'verifyEmail',
            now()->addMinutes(30),
            ['email' => $request->email]
        );
   

        Mail::send('mail', ['url' => $url, 'nom' => $request->lastname . ' ' . $request->firstname], function ($message) use ($request) {
            $config = config('mail');
            $message->subject('Registration verification !')
                ->from($config['from']['address'], $config['from']['name'])
                ->to($request->email, $request->lastname, $request->firstname);
        });
        return redirect()->back()->with('success', 'Veuillez votre consulter mail pour activer votre compte.');
    }

    public function verify(Request $request, $email)
    {
        $Utilisateur = Utilisateur::where('email', $email)->first();
        if(!$Utilisateur){
            abort(404);
        };

        if(!$request->hasValidSignature()){
            abort(404);
        };

        $Utilisateur->update([
            'email_verified_at'=> now(),
            'email_verified' => true,
        ]);
        return redirect()->route('login')->with('success', "Compte activé avec succès!");
    }

    public function emailForgot()
    {
        return view('emailForgot');
    }

    public function emailVerify(Request $request)
    {
        $request->validate([
            'email' => array(
                'required',
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"

            ),
        ]);
        $Utilisateur = Utilisateur::where('email',$request->email)->first();
        if(!$Utilisateur){
            return redirect()->back()->with('message','Invalide Email');
        }
        else{
            $url = URL::temporarySignedRoute(
                'emailChange',
                now()->addMinutes(30),
                ['email'=>$Utilisateur['email']]
            );
            Mail::send('mailForgot',['url'=>$url,'name'=> $Utilisateur['nom'].'  '.$Utilisateur['prenom']],function($message)use($Utilisateur){
                $config = config('mail');
                $name = $Utilisateur['nom'].' '.$Utilisateur['prenom'];
                $email = $Utilisateur['email'];
                $message->subject("Registration verification!")
                        ->from($config['from']['address'],$config['from']['name']) //mail d'envoi
                        ->to($email, $name);
                        
            });
            return redirect()->back()->with('message',"Veuillez consulter votre mail pour la Réinitialisation de votre mot de passe");
        }
    }

    public function emailChange(Request $request)
    {
        $email = $request->query('email');
        $Utilisateur = Utilisateur::where('email',$email)->first();
        if(!$Utilisateur){
            abort(404);
        }
        if(!$request->hasValidSignature()){
            abort(404);
        }

        session(['reini_pass'=>$Utilisateur->email]);
        return view('emailChange',compact('email'));


    }

    public function change_password(Request $request)
    {
        $Utilisateur =Utilisateur::where('email',$request->email)->first();
        $request->validate([
            'nouvpassword'=>
            array(
                'required',
            )
            ]);
            $Utilisateur->update([
                'password'=> Hash::make($request->nouvpassword),
            ]);
            return redirect()->route('login')->with('message',"Mot de passe Réinialisé avec success");

    }

    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecte l'utilisateur actuel
        $request->session()->invalidate(); // Invalide la session
        $request->session()->regenerateToken(); // Régénère le jeton CSRF

        return redirect('/login'); // Redirige l'utilisateur vers la page d'accueil ou une autre page de votre choix après la déconnexion.
    }
}
