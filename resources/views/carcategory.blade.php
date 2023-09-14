@extends("layout.mastercar")
@section("title", "ClientList")

@section("fieldtitle", "Ajouter une catégorie de voiture ici !")  

@section("form")
<form action="{{ route('addCategory') }}" method="POST" style="width: 500px" class="container mt-4">
    @csrf
    <div class="d-flex align-items-center">
        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Saisir le nom de la catégorie">
        <button type="submit" style="white-space: nowrap" class="btn btn-warning text-white ms-2">Ajouter une catégorie</button>
    </div>
</form>
@endsection

@section("table")
    <table style="width: 40rem" class="table table-hover mt-4">
        <thead>
            <tr>
              <th>Catégories</th>
              <th>Actions</th>
            </tr>
        </thead>
        @if (isset($category))
        <tbody>
            @foreach ($category as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#exempleModal.{{ $item->id }}" type="button" class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</button>
                    <a href="{{ route("trashCategory", ["id" => $item->id]) }}" type="button" class="btn btn-sm btn-outline-danger">Supprimer</a> 
                </td>
            </tr>
            <div class="modal fade" id="exempleModal.{{ $item->id }}" tabindex="-1" aria-labelledby="exempleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route("editeCategory", ["id" => $item->id]) }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center">
                                <input type="text" value="{{ $item->name }}" name="name" class="form-control" placeholder="Saisir le nom de la catégorie">
                                <button type="submit" style="white-space: nowrap" class="btn btn-warning text-white ms-2">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
        @endif
    </table> 
@endsection