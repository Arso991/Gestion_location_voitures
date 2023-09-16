<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\CarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// Route pour afficher le formulaire d'inscription
Route::get("/register",[UtilisateurController::class, "register"])->name("register");


// Route pour traiter le formulaire d'inscription
Route::post('/traitementRegister',[UtilisateurController::class, "traitementRegister"])->name("traitementRegister");

//Route pour la deconnexion 
Route::post('/logout', [UtilisateurController::class,'logout'])->name('logout');


// Route pour afficher le formulaire de connexion
Route::get('/login',[UtilisateurController::class, "login"])->name("login");



// Route pour traiter le formulaire de connexion
Route::post('/traitementLogin',[UtilisateurController::class, "traitementLogin"])->name("traitementLogin");

Route::get('.verify_email/{email}', [UtilisateurController::class,"verify"])->name('verifyEmail');

Route::get('/email_forgot',[UtilisateurController::class,"emailForgot"])->name('emailForgot');
Route::post('/emailVerify',[UtilisateurController::class,"emailVerify"])->name('emailVerify');
Route::get('/email_change',[UtilisateurController::class,"emailChange"])->name('emailChange');
Route::match(['get','post'], '/modif_pass',[UtilisateurController::class,"change_password"])->name('modif_pass');


//Router pour afficher la gestion des voitures 

Route::get('/GestionVoiture',[UtilisateurController::class, "GestionVoiture"])->name("GestionVoiture");

// router pour afficher ajoute de voiture


Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

Route::controller(ClientController::class)->group(function(){
    Route::get("/", "index")->name("index");
    Route::get("client/Form", "addclient")->name("clientForm");
    Route::post("clientForm/store", "addclientstore")->name("clientStore");
    Route::get("deleteclient/{id}", "deleteclient")->name("deleteClient");
    Route::get("editclient/{id}", "editclient")->name("editClient");
    Route::post("updateclient/store/{id}", "updateclient")->name("updateClient");
});

Route::controller(CarController::class)->group(function(){
    Route::get("carlist", "showcarlist")->name("showCarList");
    Route::get("category", "categorylist")->name("categoryList");
    Route::post("addcategory", "category")->name("addCategory");
    Route::get("trashcategory/{id}", "deletecategory")->name("trashCategory");
    Route::post("editcategory/{id}", "editecategory")->name("editeCategory");
    Route::get("brand", "brandlist")->name("brandList");
    Route::post("savebrand/store", "savebrand")->name("saveBrand");


    Route::get("model", "modellist")->name("modelList");
    Route::post("addmodel", "model")->name("addModel");
    Route::get("trashmodel/{id}", "deletemodel")->name("trashModel");
    Route::post("editmodel/{id}", "editemodel")->name("editeModel");

    Route::get("addcar", "addcar")->name("addCar");
    Route::post("savecar", "savecar")->name("savecar");
    Route::get("trashcar/{id}", "deletecar")->name("trashCar");
    Route::post("editcar/{id}", "editecar")->name("editeCar");
});