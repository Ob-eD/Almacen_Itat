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
 <title>Herramienas</title>
</head>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href={{ route('herramienta.index') }}><i class="	fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav nav-tabs">
          <a class="nav-link active" aria-current="page" href={{ route('herramienta.index') }}><i class="	fas fa-tools"></i> Herramienta</a>
        </li>  
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{ route('categorias.index') }}><i class="	fas fa-cubes"></i> Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{ route('prestamo.index') }}><i class="	fas fa-store"></i> Prestamos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{ route('alumno.index') }}><i class="	fas fa-users"></i> Alumnos</a>
        </li>
        <form class="d-flex position-absolute top-50 start-50 translate-middle" role="search" method="GET">
      
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        
      </form>
      </ul>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Agregar Herramienta <i class="	fas fa-toolbox"></i></button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="fas fa-toolbox"></i> Nueva Herramienta</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('herramienta.store') }}"  role="form" enctype="multipart/form-data" class="formEliminar">
        @csrf
        @include('herramienta.form')  
        </div>  
        <div class="modal-footer">    
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar Herramienta</button>
</div>
        </form>
      </div>
    </div>
  </div>
    </div>
  </div>
</nav>  
                  


  <div class="container mt-5">
  <div class="row">
  @foreach($herramientas->chunk(2) as $chunk)
      @foreach ($chunk as $herramienta)
      <tbody>        
      <tr>                                            
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
        <div class="col-md-4">
        <img src="{{ asset('Img/'.$herramienta->Img) }}" class="img-fluid rounded-start" alt="{{ $herramienta->Img }}">
        </div>
        <div class="col-md-8">
        <div class="card-body">
        <h5 class="card-title"><strong>{{ $herramienta->NombreHerramienta }}</strong></h5>
        <p class="card-text">{{ $herramienta->Categoria->NombreCategoria }}</p>
        <p class="card-text"><small class="text-body-secondary">Existentes: {{ $herramienta->CantidadExistente }}</small></p>
        <p class="card-text"><small class="text-body-secondary">Disponibles: {{ $herramienta->CantidadDisponible }}</small></p>

        <form action="{{ route('herramienta.destroy',$herramienta->IdHerramienta) }}" method="POST" class="formEliminar">
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#edit{{ $herramienta->IdHerramienta }}" data-bs-whatever="@getbootstrap"><i class="fa fa-fw fa-edit"></i> Editar</button>
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mostrar{{ $herramienta->IdHerramienta }}" data-bs-whatever="@getbootstrap"><i class="fa fa-fw fa-eye"></i> Detalles</button>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
        </form>

 <!--Modal Editar-->
<div class="modal fade" id="edit{{ $herramienta->IdHerramienta }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="fa fa-fw fa-edit"></i> Editar</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('herramienta/'.$herramienta->IdHerramienta) }}"  role="form" enctype="multipart/form-data" class="formEliminar">
        @csrf
        @method("PUT")
        @include('herramienta.edit')
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button> 
        </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal mostrar-->
<div class="modal fade" id="mostrar{{ $herramienta->IdHerramienta }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><i class="far fa-file-alt"></i> Detalles de {{ $herramienta->NombreHerramienta }}</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
      @include("herramienta.show")
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
      
                </div>
                </div>
                </div>
                </div>
              </td>
            </tr>
      </tbody>
    @endforeach
  @endforeach
  </div>
</div>
{!! $herramientas->links() !!}     
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
    <!-- prueba -->
</html>
