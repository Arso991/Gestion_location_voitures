<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UtilisateurController;

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
});
