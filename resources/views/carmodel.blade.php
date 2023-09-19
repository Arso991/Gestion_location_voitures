@extends('layout.mastercar')
@section('title', 'ClientList')

@section('fieldtitle', 'Ajouter un modèle de voiture ici !')

@section('form')
    <form action="{{ route('addModel') }}" method="POST" style="width: 500px" class="container mt-4">
        @csrf
        @if (isset($category))
            <select name="marque_id" class="form-select" aria-label="Default select example">
                <option selected>Selectionner la marque</option>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->marque_name }}</option>
                @endforeach
            </select>
        @endif
        <div class="d-flex align-items-center mt-3">
            <input type="text" value="{{ old('modele_name') }}" name="modele_name" class="form-control"
                placeholder="Saisir le nom du modèle">
            
                <input type="year" value="{{ old('annee') }}" name="annee" class="form-control ms-2"
                placeholder="Saisir l'année du modèle">
        </div>
        <div class="d-flex align-items-center mt-3">  
            <button type="submit" style="white-space: nowrap" class="btn btn-warning text-white ms-2">Ajouter un model</button>
        </div>
    </form>
@endsection

@section('table')
    <table style="width: 50rem" class="table table-hover mt-4">
        <thead>
            <tr>
                <th>Nom modèle</th>
                <th>Année</th>
                <th>Marque</th>
                <th>Actions</th>
            </tr>
        </thead>
        @if (isset($model))
        <tbody>
            @foreach ($model as $item)
            <tr>
                <td>{{ $item->modele_name }}</td>
                <td>{{ $item->annee }}</td>
                <td>{{ $item->brand->marque_name }}</td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#exempleModal.{{ $item->id }}" type="button" class="btn btn-sm btn-outline-dark ms-2 me-2">Modifier</button>
                    <a href="{{ route("trashModel", ["id" => $item->id]) }}" type="button" class="btn btn-sm btn-outline-danger">Supprimer</a> 
                </td>
            </tr>
            <div class="modal fade" id="exempleModal.{{ $item->id }}" tabindex="-1" aria-labelledby="exempleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content container">
                        <h3 class="text-center">Modifier le modele</h3>
                        <br>
                        <form action="{{ route("editeModel", ["id" => $item->id]) }}" method="POST">
                            @csrf
                            <select name="marque_id" class="form-select" aria-label="Default select example">
                                <option selected>Selectionner la marque</option>
                                @foreach ($category as $element)
                                    @if($element->id == $item->brands_id) 
                                        <option selected value="{{ $element->id }}">{{ $element->marque_name }}</option>
                                    @else 
                                        <option value="{{ $element->id }}">{{ $element->marque_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="d-flex align-items-center mt-3">
                                <input type="text" value="{{ $item->modele_name }}" name="modele_name" class="form-control"
                                    placeholder="Saisir le nom du modèle">
                                
                                    <input type="year" value="{{ $item->annee }}" name="annee" class="form-control ms-2"
                                    placeholder="Saisir l'année du modèle">
                            </div>
                            <div class="d-flex align-items-center mt-3">  
                                <button type="submit" style="white-space: nowrap" class="btn btn-warning text-white ms-2">Modifier le modele</button>
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