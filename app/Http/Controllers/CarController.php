<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car_category;
use App\Models\Modele;
use Illuminate\Http\Request;

class CarController extends Controller
{
//methode pour afficher la vue de la liste des voitures
    public function showcarlist(){
        return view("carlist");
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
}
