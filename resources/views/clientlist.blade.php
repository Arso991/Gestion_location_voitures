<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body style="background-color: gray">
    <header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand text-white bold" href="{{route('index')}}">GesCar</a>
                </div>
                <form class="d-flex">
                    
                    <a href="" class="btn btn-danger me-3">Deconnexion</a>
                </form>
            </div>

        </nav>
    </header>
    <div class="container text-center mt-4">
        <div>
            <button class="btn btn-dark">Gestion des voitures</button>
            <button class="btn btn-dark me-3 ms-3">Gestion des locations</button>
            <button class="btn btn-dark">Ajouter un client</button>
        </div>
        <h3 class="text-white mt-2">Liste des clients</h3>
    </div>
    <div class="me-3 ms-3">
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
        </table>
    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    $( '#multiple-select-field' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,  
    } );
</script>
</body>
</html>