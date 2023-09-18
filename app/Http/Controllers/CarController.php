<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Car_category;
use App\Models\Client;
use App\Models\Location;
use App\Models\Modele;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarController extends Controller
{
//methode pour afficher la vue de la liste des voitures
    public function showcarlist(){
        $car = Car::all();
        return view("carlist", compact('car'));
    }

    public function showOneCar($id){
        $car = Car::find($id);
        return view('showOneCar', compact('car'));
    }
//methode pour afficher la vue des catégories
    public function categorylist(){
        $category = Car_category::all();
        return view("carcategory", compact("category"));
    }
//methode pour ajouter une catégorie
    public function category(Request $request){
        $data = $request->all();
        $request->validate(["name" => "required|unique:car_category"]);
        Car_category::create(["name" => $data["name"]]);
        return redirect()->back()->with("message", "Catégorie ajoutée !");
    }
//methode pour supprimer une catégorie
    public function deletecategory($id){
        Car_category::find($id)->delete();
        return redirect()->back()->with("deletecat", "Catégorie supprimée !");
    }
//methode pour mettre à jour une catégorie
    public function editecategory(Request $request, $id){
        $data = $request->all();
        $request->validate(["name" => "required"]);
        Car_category::find($id)->update(["name" => $data["name"]]);
        return redirect()->back()->with("updatecat", "Catégorie modifiée !");
    }
//methode pour afficher la liste des marques
    public function brandlist(){
        $category = Car_category::all();
        $brands = Brand::all();
        return view("carbrand", compact("category", "brands"));
    }

    public function savebrand(Request $request){
        $data = $request->all();
        $request->validate([
            "marque_name"=>"required",
            "category_id"=>"required"
        ]);
        Brand::create([
            "marque_name"=>$data['marque_name'],
            "category_id"=>$data['category_id']
        ]);
        return redirect()->back()->with("message", "Marque ajoutée !");
    }

    public function savemodel(){
        $brands = Brand::all();

        return view("carmodel", compact("brands"));
    }


    //methode pour afficher la vue des catégories
    public function modellist(){
        $category = Brand::all();
        $model = Modele::all();
        return view("carmodel", compact("category", "model"));
    }
//methode pour ajouter une catégorie
    public function model(Request $request){
        $data = $request->all();
        $request->validate([
            "modele_name" => "required",
            "annee" => "required",
            "marque_id" => "required"
        ]);

        Modele::create([
            "modele_name" => $data["modele_name"],
            "annee" => $data["annee"],
            "brands_id" => $data["marque_id"]
        ]);
        return redirect()->back()->with("message", "Modèle ajoutée !");
    }
//methode pour supprimer une catégorie
    public function deletemodel($id){
        Modele::find($id)->delete();
        return redirect()->back()->with("deletecat", "Modèle supprimée !");
    }
//methode pour mettre à jour une catégorie
    public function editemodel(Request $request, $id){
        $data = $request->all();
        $request->validate([
            "modele_name" => "required",
            "annee" => "required",
            "marque_id" => "required"
        ]);
        Modele::find($id)->update(
            [
                "modele_name" => $data["modele_name"],
                "annee" => $data["annee"],
                "brands_id" => $data["marque_id"]
            ]
        );
        return redirect()->back()->with("updatecat", "Modèle modifiée !");
    }

    public function addcar(){
        $model = Modele::all();
        return view("addcar", compact('model'));
    }

    //methode pour ajouter une catégorie
    public function savecar(Request $request){
        $data = $request->all();
        // dd($data);
        $request->validate([
            "nom" => "required",
            "boite_vitesse" => "required",
            "puissance" => "required",
            "nbre_porte" => "required",
            "carburant" => "required",
            "nbre_cylindre" => "required",
            "soupape" => "required",
            "vitesse_max" => "required",
            "carosserie" => "required",
            "transmission" => "required",
            "frein" => "required",
            "acceleration" => "required",
            "couleur" => "required",
            "modele_id" => "required",
            "image_principale" => "required|mimes:jpeg,jpg,png"
        ]);

        $image = null;
        $file = $request->file("image_principale");
        $image1 = null;
        $file1 = $request->file("image2");
        $image2 = null;
        $file2 = $request->file("image3");
        
        if(isset($file)){
            $image = $file->store("photo");
        }

        if(isset($file1)){
            $image1 = $file->store("photo");
        }

        if(isset($file2)){
            $image2 = $file->store("photo");
        }

        Car::create([
            "nom_voiture"  => $data["nom"],
            "boite_vitesse"  => $data["boite_vitesse"],
            "puissane" => $data["puissance"],
            "nbre_porte" => $data["nbre_porte"],
            "carburant" => $data["carburant"],
            "nbre_cylindre" => $data["nbre_cylindre"],
            "soupape" => $data["soupape"],
            "vitesse_max" => $data["vitesse_max"],
            "carosserie" => $data["carosserie"],
            "transmission" => $data["transmission"],
            "frein" => $data["frein"],
            "acceleration" => $data["acceleration"],
            "image_principale" => $image,
            "image_3" => $image1,
            "image_2" => $image2,
            "couleur" => $data["couleur"],
            "modele_id" => $data["modele_id"],
        ]);
        return  redirect('/carlist')->with("message", "Modèle ajoutée !");
    }
//methode pour supprimer une catégorie
    public function deletecar($id){
        Modele::find($id)->delete();
        return redirect()->back()->with("deletecat", "Modèle supprimée !");
    }
//methode pour mettre à jour une catégorie
    public function editecar(Request $request, $id){
        $data = $request->all();
        $request->validate([
            "modele_name" => "required",
            "annee" => "required",
            "marque_id" => "required"
        ]);
        Modele::find($id)->update(
            [
                "modele_name" => $data["modele_name"],
                "annee" => $data["annee"],
                "brands_id" => $data["marque_id"]
            ]
        );
        return redirect()->back()->with("updatecat", "Modèle modifiée !");
    }



    public function locationlist() {
        $locations = Location::all();
        return view('locationlist', compact('locations'));
    }

    public function addlocation() {
        $cars = Car::all();
        $clients = Client::all();
        return view('addlocation', compact('cars', 'clients'));
    }

    public function savelocation(Request $request) {
        $data = $request->all();
        $request->validate([
            "id_client"=>"required",
            "id_voiture"=>"required",
            "date_retour"=>"required",
        ]);
        Location::create([
            "date_sortie"=>Carbon::now(),
            "date_prevue"=>$data['date_retour'],
            "id_client"=>$data['id_client'],
            "id_voiture"=>$data['id_voiture']
        ]);
        return redirect('/location')->with("message", "Location ajoutée !");
    }

    public function editlocation($id){
        $location = Location::find($id);
        $cars = Car::all();
        $clients = Client::all();
        return view("addlocation",compact("location","cars", "clients", "id"));
    }

    public function updatelocation(Request $request, $id){
        $data = $request->all();
        // dd($data);
        Location::find($id)->update([
            "date_retour" => $data["date_effective"],
            "observation" => $data["observation"],
        ]);

        return redirect()->route("locationlist")->with("updatemsg", "Retour effectué avec succès!");
    }
}

