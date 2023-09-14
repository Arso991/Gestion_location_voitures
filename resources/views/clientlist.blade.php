@extends("layout.master")

@section("title", "ClientList")

@section("buttons")
@include("includes.headbuttons")
@endsection

@section("fieldtitle", "Liste des clients")

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
                  <th>Photo</th>
                  <th>Nom et prénoms</th>
                  <th>Téléphone</th>
                  <th>Adresse</th>
                  <th>Email</th>
                  <th>CNI</th>
                  <th>Actions</th>
                </tr>
            </thead>
            @if (isset($classlist))
            <tbody>
                @foreach ($classlist as $item)
                <tr>
                    <td>
                        <div style="width: 3rem; height: 3rem;">
                            <img src="{{ asset($item["photo"]) }}" width="100%" height="100%" style="object-fit: cover" alt="">
                        </div>
                    </td>
                    <td>{{ $item->nom }} {{ $item->prenom }}</td>
                    <td>{{ $item->tel }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->cni }}</td>
                    <td>
                      <div>
                        <button data-bs-toggle="modal" data-bs-target="#exempleModal.{{ $item->id }}" type="button" class="btn btn-sm btn-warning">Voir plus</button>
                        <a href="{{ route("editClient", ["id"=>$item->id]) }}" type="button" class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</a>
                        <a href="{{ route("deleteClient", ["id"=>$item->id]) }}" type="button" class="btn btn-sm btn-outline-danger">Supprimer</a> 
                      </div>
                  </td>
                </tr>
                <div class="modal" id="exempleModal.{{ $item->id }}" tabindex="-1" aria-labelledby="exempleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="card box-shadow">
                                <div style="height: 20rem">
                                    <img src="{{ asset("$item->photo") }}" alt="" width="100%" height="100%" style="object-fit:cover;" class="card-img-top">
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <h2 class="mb-3 text-muted">{{ $item->nom }} {{ $item->prenom }}</h2>
                                        <p class="text-muted">Contact : {{ $item->tel }}</p>
                                        <p class="text-muted">Adresse : {{ $item->address }}</p>
                                        <p class="text-muted">Email : {{ $item->email }}</p>
                                        <p class="text-muted">CNI : {{ $item->cni }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="" class="btn btn-sm btn-outline-secondary">Précedent</a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Suivant</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
            @endif
        </table>
        {{-- <table class="table table-hover">
            <thead>
                <tr>
                  <th>Photo</th>
                  <th>Nom et prénoms</th>
                  <th>Téléphone</th>
                  <th>Adresse</th>
                  <th>Email</th>
                  <th>CNI</th>
                  <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>Kakpo Brice</td>
                    <td>95621478</td>
                    <td>Cotonou</td>
                    <td>brice@gmail.com</td>
                    <td>201963258741</td>
                    <td>
                      <div>
                        <a href="" type="button" class="btn btn-sm btn-warning">Voir plus</a>
                        <button type="button" class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</button>
                        <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button> 
                      </div>
                  </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kakpo Brice</td>
                    <td>95621478</td>
                    <td>Cotonou</td>
                    <td>brice@gmail.com</td>
                    <td>201963258741</td>
                    <td>
                      <div>
                        <a href="" type="button" class="btn btn-sm btn-warning">Voir plus</a>
                        <button type="button" class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</button>
                        <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
                      </div>
                  </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kakpo Brice</td>
                    <td>95621478</td>
                    <td>Cotonou</td>
                    <td>brice@gmail.com</td>
                    <td>201963258741</td>
                    <td>
                      <div>
                        <a href="" type="button" class="btn btn-sm btn-warning">Voir plus</a>
                        <button type="button" class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</button>
                        <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
                      </div>
                  </td>
                </tr>
            </tbody>
        </table> --}}
@endsection