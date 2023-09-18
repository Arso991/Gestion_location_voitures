@extends("layout.master")
@section("title", "ClientList")
@if (isset($id))
@section("fieldtitle", "Vous pouvez modifier les information du client !")
@else
@section("fieldtitle", "Ajouter un client ici !")  
@endif

@section("content")
<div class="d-flex justify-content-center align-items-center" >
    @if (isset($id))
    <form style="width: 40rem" method="POST" action="{{ route("updateClient", ["id"=>$clientX->id]) }}" enctype="multipart/form-data">
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
        <div class="mt-3">
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Photo</span>
                <input value="{{ $clientX->photo }}" name="picture" class="form-control" type="file">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Nom</span>
                <input value="{{ $clientX->nom }}" name="nom" class="form-control" type="text" placeholder="Saisir le nom">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Prénom</span>
                <input value="{{ $clientX->prenom }}" name="prenom" class="form-control" type="text" placeholder="Saisir le prénom">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Téléphone</span>
                <input value="{{ $clientX->tel }}" name="tel" class="form-control" type="text" placeholder="Saisir le numéro de téléphone">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Adresse</span>
                <input value="{{ $clientX->address }}" name="address" class="form-control" type="text" placeholder="Saisir l'adresse">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">CNI</span>
                <input value="{{ $clientX->cni }}" name="cni" class="form-control" type="text" placeholder="Saisir le numéro de la carte">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Email</span>
                <input value="{{ $clientX->email }}" name="email" class="form-control" type="email" placeholder="Saisir le mail">
            </div>
        </div>
        <button style="width: 100%" class="btn btn-warning mt-3 " type="submit">Modifier</button>
    </form>
    @else
    <form style="width: 40rem" method="POST" action="{{ route("clientStore") }}" enctype="multipart/form-data">
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
        <div class="mt-3">
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Photo</span>
                <input name="picture" class="form-control" type="file">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Nom</span>
                <input value="{{ old("nom") }}" name="nom" class="form-control" type="text" placeholder="Saisir le nom">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Prénom</span>
                <input value="{{ old("prenom") }}" name="prenom" class="form-control" type="text" placeholder="Saisir le prénom">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Téléphone</span>
                <input value="{{ old("tel") }}" name="tel" class="form-control" type="text" placeholder="Saisir le numéro de téléphone">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Adresse</span>
                <input value="{{ old("address") }}" name="address" class="form-control" type="text" placeholder="Saisir l'adresse">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">CNI</span>
                <input value="{{ old("cni") }}" name="cni" class="form-control" type="text" placeholder="Saisir le numéro de la carte">
            </div>
            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Email</span>
                <input value="{{ old("email") }}" name="email" class="form-control" type="email" placeholder="Saisir le mail">
            </div>
        </div>
        <button style="width: 100%" class="btn btn-warning mt-3 " type="submit">Enregistrer</button>
    </form>
    @endif
    
</div>
@endsection