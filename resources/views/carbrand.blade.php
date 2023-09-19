@extends('layout.mastercar')
@section('title', 'ClientList')

@section('fieldtitle', 'Ajouter une marque de voiture ici !')

@section('form')
    <form action="{{ route('saveBrand') }}" method="POST" style="width: 500px" class="container mt-4">
        @csrf
        @if (isset($category))
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>Selectionner la catégorie</option>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        @endif
        <div class="d-flex align-items-center mt-3">
            <input type="text" value="{{ old('marque_name') }}" name="marque_name" class="form-control"
                placeholder="Saisir le nom de la marque">
            <button type="submit" style="white-space: nowrap" class="btn btn-warning text-white ms-2">Ajouter une
                marque</button>
        </div>
    </form>
@endsection

@section('table')
    <table style="width: 50rem" class="table table-hover mt-4">
        <thead>
            <tr>
                <th>Catégories</th>
                <th>Marques</th>
                <th>Actions</th>
            </tr>
        </thead>
        @if ($brands)
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->category->name }}</td>
                        <td>{{ $brand->marque_name }}</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#exempleModal" type="button"
                                class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</button>
                            <a href="" type="button" class="btn btn-sm btn-outline-danger">Supprimer</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="exempleModal" tabindex="-1" aria-labelledby="exempleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="d-flex align-items-center">
                                        <input type="text" value="" name="name" class="form-control"
                                            placeholder="Saisir le nom de la catégorie">
                                        <button type="submit" style="white-space: nowrap"
                                            class="btn btn-warning text-white ms-2">Modifier</button>
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
