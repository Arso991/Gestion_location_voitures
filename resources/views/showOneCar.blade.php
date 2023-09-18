@extends("layout.master")
@section("title", "ClientList")
@section("buttons")
<div class="container text-center mt-4">
    <a href="{{ route("categoryList") }}" class="btn btn-dark">Ajouter une catégorie</a>
    <a href="{{ route("brandList") }}" class="btn btn-dark me-3 ms-3">Ajouter une marque</a>
    <a href="{{ route("modelList") }}" class="btn btn-dark me-3 ms-3">Ajouter un modèle</a>
    <a href="{{ route("addCar") }}" class="btn btn-dark">Ajouter une voiture</a>
</div>
@endsection
@section("fieldtitle", "Fiche technique de la voiture $car->nom_voiture !")
@section("content")
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="">
                        <img width="250px" height="150px" src="{{ asset($car["image_principale"]) }}" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <img width="250px" height="150px" src="{{ asset($car["image_3"]) }}" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <img width="250px" height="150px" src="{{ asset($car["image_2"]) }}" alt="">
                    </div>
                </div>
            </div>
            <div class=" mb-4 box-shadow">
                
                
                <div class="mt-3">
                    <br>
                    <h4 class="text-center text-white">Caractéristiques de la voiture</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">      
                                <tbody>
                                    <tr>
                                        <th>Nom de la voiture</th>
                                        <td>{{ $car->nom_voiture }}</td>
                                    </tr>
                                    <tr>
                                        <th>Modèle</th>
                                        <td>{{ $car->modele->modele_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Année</th>
                                        <td>{{ $car->modele->annee }}</td>
                                    </tr>
                                    <tr>
                                        <th>Boîte de vitesse</th>
                                        <td>{{ $car->boite_vitesse }}</td>
                                    </tr>
                                    <tr>
                                        <th>Soupape</th>
                                        <td>{{ $car->soupape }}</td>
                                    </tr>
                                    <tr>
                                        <th>Vitesse max</th>
                                        <td>{{ $car->vitesse_max }}</td>
                                    </tr>
                                    <tr>
                                        <th>Carosserie</th>
                                        <td>{{ $car->carosserie }}</td>
                                    </tr>
                                    <tr>
                                        <th>Acceleration</th>
                                        <td>{{ $car->acceleration }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">      
                                <tbody>
                                    <tr>
                                        <th>Marque</th>
                                        <td>{{ $car->modele->brand->marque_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Puissance</th>
                                        <td>{{ $car->puissane }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nombre de portes</th>
                                        <td>{{ $car->nbre_porte }}</td>
                                    </tr>
                                    <tr>
                                        <th>Caburant</th>
                                        <td>{{ $car->carburant }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nombre de cylindre</th>
                                        <td>{{ $car->nbre_cylindre }}</td>
                                    </tr>
                                    <tr>
                                        <th>Transmission</th>
                                        <td>{{ $car->transmission }}</td>
                                    </tr>
                                    <tr>
                                        <th>Frein</th>
                                        <td>{{ $car->frein }}</td>
                                    </tr>
                                    <tr>
                                        <th>Couleur</th>
                                        <td>{{ $car->couleur }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection