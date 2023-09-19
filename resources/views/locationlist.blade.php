@extends("layout.master")

@section("title", "ClientList")

@section("buttons")
    <div class="container text-center mt-4">
        <a href="{{ route('locationlist') }}" class="btn btn-dark me-3 ms-3">Liste des locations</a>
        <a href="{{ route("addlocation") }}" class="btn btn-dark">Ajouter une location</a>
    </div>
@endsection

@section("fieldtitle", "Liste des locations")

@section("content")
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Message !</strong> <br> {{ session("message") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('deletemsg'))
<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
    <strong>Message !</strong> <br> {{ session("deletemsg") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('updatemsg'))
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <strong>Message !</strong> <br> {{ session("updatemsg") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nom et prénoms client</th>
            <th>Modèle voiture</th>
            <th>Marque</th>
            <th>Année</th>
            <th>Date de sortie</th>
            <th>Date de retour prévue</th>
            <th>Date de retour effective</th>
            <th>Délai respecté</th>
            <th>Observation</th>
            <th>Voir fiche technique</th>
            <th>Actions</th>
        </tr>
    </thead>
    @if (isset($locations))
    <tbody>
        @foreach ($locations as $item)
        <tr>
            <td>{{ $item->client->nom }} {{ $item->client->prenom }}</td>
            <td>{{ $item->voiture->modele->modele_name }}</td>
            <td>{{ $item->voiture->modele->brand->marque_name }}</td>
            <td>{{ $item->voiture->modele->annee }}</td>
            <td>{{ $item->date_sortie }}</td>
            <td>{{ $item->date_prevue }}</td>
            <td>
                @if ($item->date_retour != null)
                    {{ $item->date_retour }}
                @else
                    <span style="color: white">Indisponible</span>
                @endif
            </td>
            <td>
                @if ($item->date_retour != null)
                    @if ($item->date_retour <= $item->date_prevue)
                        <span style="color: green">Délai respecté</span>
                    @else
                        <span style="color: red">Délai non respecté</span>
                    @endif
                @else
                    <span style="color: white">Indisponible</span>
                @endif
               
            </td>
            <td>
                @if ($item->observation != null)
                    {{ $item->observation }}
                @else
                    <span style="color: white">Indisponible</span>
                @endif
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('showOneCar', ['id' => $item->voiture->id]) }}">Voir fiche technique</a>
            </td>
            <td>
                <div>
                {{-- <button data-bs-toggle="modal" data-bs-target="#exempleModal.{{ $item->id }}" type="button" class="btn btn-sm btn-warning">Voir plus</button> --}}
                <a href="{{ route("editlocation", ["id"=>$item->id]) }}" type="button" class="btn btn-sm btn-warning ms-2 me-2">Fais le retour</a>
                {{-- <a href="{{ route("deleteClient", ["id"=>$item->id]) }}" type="button" class="btn btn-sm btn-outline-danger">Supprimer</a>  --}}
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endif
</table>

@endsection