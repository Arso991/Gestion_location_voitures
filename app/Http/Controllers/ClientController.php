<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $classlist = Client::all();
        return view("clientlist", compact("classlist"));
    }

    public function addclient(){
        return view("clientinfo");
    }

    public function addclientstore(Request $request){
        $data = $request->all();

        $request->validate([
            "nom" => "required|min:2",
            "prenom" => "required|min:2",
            "tel" => "required|numeric|unique:clients|min:8",
            "address" => "required",
            "picture" => "required|mimes:jpeg,jpg,png",
            "cni" => "required|min:2|unique:clients",
            "email" => "required|unique:clients|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
        ]);

        $image = null;
        $file = $request->file("picture");
        
        if(isset($file)){
            $image = $file->store("photo");
        }

        Client::create([
            "nom" => $data["nom"],
            "prenom" => $data["prenom"],
            "tel" => $data["tel"],
            "address" => $data["address"],
            "photo" => $image,
            "cni" => $data["cni"],
            "email" => $data["email"],
        ]);

        return redirect()->route("index")->with("message", "Client ajouté avec succès !");
    }

    public function editclient($id){
        $clientX = Client::find($id);
        return view("clientinfo",compact("clientX", "id"));
    }

    public function updateclient(Request $request, $id){
        $data = $request->all();
        $request->validate([
            "nom" => "required|min:2",
            "prenom" => "required|min:2",
            "tel" => "required|numeric|min:8",
            "address" => "required",
            "picture" => "required|mimes:jpeg,jpg,png",
            "cni" => "required|min:2",
            "email" => "required|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
        ]);
        $picture = null;
        $file = $request->file("picture");
        
        if(isset($file)){
            $picture = $file->store("photo");
        }
        Client::find($id)->update([
            "nom" => $data["nom"],
            "prenom" => $data["prenom"],
            "tel" => $data["tel"],
            "address" => $data["address"],
            "photo" => $picture,
            "cni" => $data["cni"],
            "email" => $data["email"],
        ]);

        return redirect()->route("index")->with("updatemsg", "Informations du client mise à jours !");
    }

    public function deleteclient($id){
        Client::find($id)->delete();
        return redirect()->back()->with("deletemsg", "Vous avez supprimé le client !");
    }
}
