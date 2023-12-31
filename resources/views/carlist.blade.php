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
@section("fieldtitle", "Liste des voitures disponible !")
@section("content")
<div class="container mt-3">
    <div class="row">
        @forelse ($car as $item)
            <div class="col-md-6">
                <div class="car_field mb-4 box-shadow">
                    <div class="car_field_img">
                        <img src="{{ asset($item["image_principale"]) }}" alt="">
                    </div>
                    <div class="car_field_right">
                        <h5 class="car_field_right_title text-white">{{ $item->nom_voiture }}</h5>
                        <div class="car_field_right_text">
                            <div class="car_field_right_text_left">
                                <div class="car_field_right_text_left_item">
                                    <span  style="width: 6rem">Catégorie</span> 
                                    <span  style="width: 1rem">:</span> 
                                    <span class="text-capitalize">{{$item->modele->brand->category->name}}</span>
                                </div>
                                <div class="car_field_right_text_left_item">
                                    <span  style="width: 6rem">Marque</span> 
                                    <span  style="width: 1rem">:</span> 
                                    <span class="text-capitalize">{{$item->modele->brand->marque_name}}</span>
                                </div>
                                <div class="car_field_right_text_left_item">
                                    <span  style="width: 6rem">Modèle</span> 
                                    <span  style="width: 1rem">:</span> 
                                    <span class="text-capitalize">{{$item->modele->modele_name}}</span>
                                </div>
                                <div class="car_field_right_text_left_item">
                                    <span  style="width: 6rem">Année</span> 
                                    <span  style="width: 1rem">:</span> 
                                    <span class="text-capitalize">{{$item->modele->annee}}</span>
                                </div>
                            </div>
                            <div class="car_field_right_text_right">
                                <div class="car_field_right_text_left_item">
                                    <span  style="width: 6rem">Couleur</span> 
                                    <span  style="width: 1rem">:</span> 
                                    <span class="text-capitalize">{{$item->couleur}}</span>
                                </div>
                                <a class="btn btn-sm btn-warning text-white text-uppercase" href="{{ route('showOneCar', ["id" => $item->id]) }}">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center pt-3">
                Aucune voiture
            </p>
        @endforelse
    </div>
</div>

@endsection