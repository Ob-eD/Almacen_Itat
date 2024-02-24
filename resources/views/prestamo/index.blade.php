<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
  type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Prestamo</title>
</head>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
          <div class="container-fluid">
            <a class="navbar-brand" href={{ route('herramienta.index') }}><i class="	fas fa-home"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-disabled="page" href={{ route('herramienta.index') }}><i
                      class="	fas fa-tools"></i> Herramientas</a>
                </li>
                <li class="nav nav-tabs">
                  <a class="nav-link active" aria-current="page" href={{ route('prestamo.index') }}><i
                      class="	fas fa-store"></i> Prestamos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href={{ route('alumno.index') }}><i
                      class="	fas fa-users"></i> Alumnos</a>
                </li>
              </ul>
              <form class="d-flex position-absolute top-50 start-50 translate-middle" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
              </form>

              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@getbootstrap">Agregar Prestamo <i class="fas fa-cart-arrow-down"> </i></button>
<!--Modal Crear Prestamo-->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="fas fa-cart-arrow-down"></i> Nuevo Prestamo</h2>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('prestamo.store') }}" method="post" class="formEliminar">
                        @csrf
                        @include('prestamo.form')
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Agregar Prestamo</button>
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
              <thead class="thead">
                <tr>
                  <th>ID Prestamo</th>
                  <th>Alumno</th>
                  <th>Fecha de Prestamo</th>
                  <th>Herramienta</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prestamos as $prestamo)
                <tr>
                  <td>{{ $prestamo->IdPrestamo }}</td>
                  <td>{{ $prestamo->Alumno->Nombre}}</td>
                  <td>{{ $prestamo->FechaPrestamo }}</td>
                  <td>{{ $prestamo->Herramienta->NombreHerramienta }}</td>
                  <td>{{ $prestamo->Status }}</td>
                      <td>
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detalles{{ $prestamo->IdPrestamo }}" ><i class="fas fa-file-alt"></i> Detalles</button> 
                      <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#devolver{{ $prestamo->IdPrestamo }}" ><i class="fa fa-fw fa-sign-in-alt"></i> Devolver</button>

<!--Modal Editar-->
<div class="modal fade" id="devolver{{ $prestamo->IdPrestamo }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="fa fa-fw fa-sign-in-alt"></i> Devolver</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('prestamo/'.$prestamo->IdPrestamo) }}" class="formEliminar" >
        @csrf
        @method("PUT")
        @include('prestamo.edit')
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button> 
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal mostrar-->
<div class="modal fade" id="detalles{{ $prestamo->IdPrestamo }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="	far fa-file-alt"></i> Detalles del Prestamo de {{ $prestamo->Alumno->Nombre }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
      @include("prestamo.mostrar")
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
                  </td>
                  <td>
                    <form action="{{ route('prestamo.destroy',$prestamo->IdPrestamo) }}" method="post" class="formEliminar">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>              
                      </form>
                      </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {!! $prestamos->links() !!}
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

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    
</html>