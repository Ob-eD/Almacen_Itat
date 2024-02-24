<!DOCTYPE html>
<html lang="en">
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


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Detalles de Prestamo</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('prestamo.index') }}">
                                <i class=" fas fa-angle-double-left"></i> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Prestamo:</strong>
                            {{ $prestamos->IdPrestamo }}
                        </div>
                        <div class="form-group">
                            <strong>Alumno:</strong>
                            {{ $prestamos->Alumno->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Prestamo:</strong>
                            {{ $prestamos->FechaPrestamo }}
                        </div>
                        <div class="form-group">
                            <strong>Herramienta:</strong>
                            {{ $prestamos->Herramienta->NombreHerramienta }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Prestada:</strong>
                            {{ $prestamos->CantidadPrestada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Devolucion:</strong>
                            {{ $prestamos->FechaDevolucion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantiad Devuelta:</strong>
                            {{ $prestamos->CantidadDevuelta }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $prestamos->Observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $prestamos->Status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</html>
