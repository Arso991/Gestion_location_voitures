@extends("layout.master")
@section("title", "ClientList")
@if (isset($id))
@section("fieldtitle", "Vous pouvez notifier les informations de retour ici !")
@else
@section("fieldtitle", "Ajouter une location ici !")  
@endif

@section("content")
<div class="d-flex justify-content-center align-items-center">
    @if (isset($id))
        <form style="width: 40rem" method="POST" action="{{ route("updatelocation", ["id"=>$location->id]) }}">
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
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Client</span>
                    <select disabled class="form-select" name="id_client" id="id_client">                            
                        <option value="{{$location->client->id}}">{{ $location->client->nom}} {{ $location->client->prenom}}</option>
                    </select>
                </div>
    
                <div class="input-group mb-3">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Voiture</span>
                    <select disabled class="form-select" name="id_voiture" id="id_voiture">
                            <option value="{{$location->voiture->id}}">{{ $location->voiture->modele->brand->category->name }}_{{$location->voiture->modele->modele_name}}_{{$location->voiture->modele->annee}}_{{$location->voiture->nom_voiture}}</option>
                    </select>
                </div>
    
                <div class="input-group mb-3">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Retour effective</span>
                    <input value="{{ old("date_effective") }}" name="date_effective" class="form-control" type="date" placeholder="Saisir la date de retour effective">
                </div>
                <div class="input-group mb-3">
                    <span style="width: 7rem" class="input-group-text bg-primary text-white">Observation</span>
                    <textarea name="observation" class="form-textarea" id="" cols="50" rows="5"></textarea>
                </div>
            </div>
            <button style="width: 100%" class="btn btn-warning mt-3 " type="submit">Modifier</button>
        </form>
    @else
    <form style="width: 40rem" method="POST" action="{{ route("savelocation") }}">
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
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Client</span>
                <select class="form-select" name="id_client" id="id_client">
                    @foreach ($clients as $item)
                        <option value="{{$item->id}}">{{ $item->nom}} {{ $item->prenom}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Voiture</span>
                <select class="form-select" name="id_voiture" id="id_voiture">
                    @foreach ($cars as $item)
                        <option value="{{$item->id}}">{{ $item->modele->brand->category->name }}_{{$item->modele->modele_name}}_{{$item->modele->annee}}_{{$item->nom_voiture}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <span style="width: 7rem" class="input-group-text bg-primary text-white">Date de retour prévu</span>
                <input value="{{ old("date_retour") }}" name="date_retour" class="form-control" type="date" placeholder="Saisir la date de retour prévu">
            </div>
        </div>
        <button style="width: 100%" class="btn btn-warning mt-3 " type="submit">Enregistrer</button>
    </form>
    @endif
    
</div>

@endsection