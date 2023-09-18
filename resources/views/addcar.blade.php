@extends('layout.mastercar')
@section('title', 'ClientList')

@section('fieldtitle', 'Ajouter une voiture ici !')


@section("form")
<div class="d-flex justify-content-center align-items-center">
    
    <form method="POST" action="{{ route("savecar") }}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Nom</span>
                    <input value="{{ old("nom") }}" name="nom" class="form-control" type="text" required placeholder="Saisir le nom">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Boite vitesse</span>
                    <input value="{{ old("boite_vitesse") }}" name="boite_vitesse" class="form-control" type="text" required placeholder="Saisir la boite de vitesse">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Puissance</span>
                    <input value="{{ old("puissance") }}" name="puissance" class="form-control" type="number" required placeholder="Saisir la puissance">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Nombre de porte</span>
                    <input value="{{ old("nbre_porte") }}" name="nbre_porte" class="form-control" type="number" required placeholder="Saisir le nbre de porte">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Carburant</span>
                    <input value="{{ old("carburant") }}" name="carburant" class="form-control" type="text" required placeholder="Saisir le carburant">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Nombre de cylindre</span>
                    <input value="{{ old("nbre_cylindre") }}" name="nbre_cylindre" class="form-control" type="number" required placeholder="Saisir le nombre de cylindre">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group col-md-4 mb-3">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Soupape</span>
                    <input value="{{ old("soupape") }}" name="soupape" class="form-control" type="number" required placeholder="Saisir la soupape">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group col-md-4 mb-3">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Vitesse max</span>
                    <input value="{{ old("vitesse_max") }}" name="vitesse_max" class="form-control" type="number" required placeholder="Saisir la vitesse max">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Carosserie</span>
                    <input value="{{ old("carosserie") }}" name="carosserie" class="form-control" type="text" required placeholder="Saisir la carosserie">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Transmission</span>
                    <input value="{{ old("transmission") }}" name="transmission" class="form-control" type="text" required placeholder="Saisir la transmission">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Frein</span>
                    <input value="{{ old("frein") }}" name="frein" class="form-control" type="text" required placeholder="Saisir le frein">
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Acceleration</span>
                    <input value="{{ old("acceleration") }}" name="acceleration" class="form-control" type="number" required placeholder="Saisir l'accélération">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Couleur</span>
                    <input value="{{ old("couleur") }}" name="couleur" class="form-control" type="text" required placeholder="Saisir la couleur">
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Modele</span>
                    <select name="modele_id" class="form-select" required id="">
                        @foreach ($model as $item)
                            <option value="{{$item->id}}">{{$item->modele_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Image </span>
                    <input name="image_principale" class="form-control" required type="file">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Image 2</span>
                    <input name="image2" class="form-control"  type="file">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Image 3</span>
                    <input name="image3" class="form-control" type="file">
                </div>
            </div>
        </div>

        <button style="width: 100%" class="btn btn-warning mt-3 " type="submit">Enregistrer</button>
    </form>
</div>
@endsection