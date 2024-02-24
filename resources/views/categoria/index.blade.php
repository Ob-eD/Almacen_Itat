
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Categoria</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
<div class="container-fluid">
    <a class="navbar-brand" href={{ route('herramienta.index') }}><i class="	fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-disabled="page" href={{ route('herramienta.index') }}><i class="	fas fa-tools"></i> Herramientas</a>
        </li>
        <li class="nav nav-tabs">
          <a class="nav-link active" aria-current="page" href={{ route('categorias.index') }}><i class="	fas fa-cubes"></i> Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{ route('prestamo.index') }}><i class="	fas fa-store"></i> Prestamos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{ route('alumno.index') }}><i class="	fas fa-users"></i> Alumnos</a>
        </li>
      </ul>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Crear nueva Categoria <i class="		fas fa-shapes"></i></button>

<!--Modal Crear Categoria-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="fas fa-shapes"></i> Nueva Categoria</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('categorias') }}" method="post" class="formEliminar">
        @csrf        
        @include('categoria.create')
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Crear Categoria</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    </div>
  </div>
</nav>  

<div class="card-body">
      <div class="table-responsive">
          <table class="table table-striped table-hover">
          <thead class="table table-hover">
                    <tr>
										<th>ID</th>
										<th>Categoria</th>
										<th>Descripcion</th>					
                    <th></th>
                    </tr>
          </thead>
          <tbody>
              @foreach ($categorias as $categoria)
                    <tr>                        
										<td>{{ $categoria->IdCategoria }}</td>
										<td>{{ $categoria->NombreCategoria }}</td>
										<td>{{ $categoria->Descripcion }}</td>                    
                    <td>
           <form action="{{ route('categoria.destroy',$categoria->IdCategoria) }}" method="POST" class="formEliminar">
              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detalles{{ $categoria->IdCategoria }}" ><i class="fa fa-fw fa-edit"></i> Editar</button>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
           </form>
 <!--Modal Editar-->
<div class="modal fade" id="detalles{{ $categoria->IdCategoria }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="fa fa-fw fa-edit"></i> Actualizar Datos</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('categoria/'.$categoria->IdCategoria) }}"  role="form" enctype="multipart/form-data" class="formEliminar">
        @csrf
        @method("PUT")
        @include('categoria.edit')
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button> 
        </div>
        </form>
             </div>
           </div>
          </div>                                                   
        </td>
      </tr>
@endforeach
    </tbody>
   </table>
  </div>
</div>  

<script>
      document.addEventListener("DOMContentLoaded", function () {

        var successMessage = "{{ session('success') }}";
        var errorMessage = "{{ session('error') }}";

        if (successMessage || errorMessage){
          Swal.fire({
            position: "center",
            icon: successMessage ? 'success' : 'error',
            title: successMessage || errorMessage,
            showConfirmButton: true,
            timer: 15000
          });
        }

        var deleteButtons = document.querySelectorAll('');

        deleteButtons.forEach(function (button) {
          button.addEventListener('click', function (event) {
          event.preventDefault();

          Swal.fire({
                        title: '¿Esta Seguro de Realizar esta Acción?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#F30719',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar'
          }).then((result) => {
            if (result.isConfirmed) {
              event.target.closest('form').submit();
            }
          });
        });
      });
    });
    </script>

    <script>
        (function (){
            'use strict'
            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
            .forEach(function(form){
                form.addEventListener('submit', function (event){
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Esta Seguro de Realizar esta Acción?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#F30719',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.isConfirmed){
                          event.target.closest('form').submit();
                            
                        }
                    })
                }, false)
            })
        })()
        </script>
  </body>    
</html>