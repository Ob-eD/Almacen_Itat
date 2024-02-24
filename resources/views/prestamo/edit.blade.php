@if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
<div class="row justify-content-center">
<div class="mb-3 row">
    <label for="AlumnoNoControl" class="col-form-label">Alumno</label>
    <div class="col-ms-5">
        <label  class="form-control" name="AlumnoNoControl" id="AlumnoNoControl" value="{{ ($prestamo->AlumnoNocontrol) }}">{{ ($prestamo->Alumno->Nombre) }}</label>
    </div>
</div>


<div class="mb-3 row">
    <label for="FechaPrestamo" class="col-form-label">Fecha De Prestamo</label>
    <div class="col-ms-5">
        <input type="date" class="form-control" name="FechaPrestamo" id="FechaPrestamo" value="{{ ($prestamo->FechaPrestamo) }}" disabled>
    </div>
</div>

<div class="mb-3 row">
    <label for="HerramientaIdHerramienta" class="col-form-label">Herramienta</label>
    <div class="col-ms-5">
        <label  class="form-control" name="HerramientaIdHerramienta" id="HerramientaIdHerramienta" value="{{ ($prestamo->HerramientaIdHerramienta) }}">{{ ($prestamo->Herramienta->NombreHerramienta) }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="CantidadPrestada" class="col-form-label">Cantidad Prestada</label>
    <div class="col-ms-5">
        <label  class="form-control" name="CantidadPrestada" id="CantidadPrestada" value="{{ ($prestamo->CantidadPrestada) }}">{{ ($prestamo->CantidadPrestada) }}</label>
    </div>
</div>

<div class="mb-3 row">
    <label for="FechaDevolucion" class="col-form-label">Fecha de Devolucion</label>
    
        <input type="date" class="form-control" name="FechaDevolucion" id="FechaDevolucion" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
    </div>


<div class="mb-3 row">
    <label for="CantidadDevuelta" class="col-form-label">Cantidad Devuelta : {{ ($prestamo->CantidadDevuelta) }}</label>
    <div class="col-ms-5">
        <input type="number" class="form-control" name="CantidadDevuelta" id="CantidadDevuelta">
    </div>
</div>

<div class="mb-3 row">
            <label for="Observaciones" class="col-form-label">Observaciones </label>
            <div class="col-ms-5">
            <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3" required>{{ ($prestamo->Observaciones) }}</textarea>
          </div>
        </div>


<div class="mb-3 row">
    <label for="Status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-5">
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Status" id="Status" value="Pendiente" required>
  <label class="form-check-label" for="Status">Pendiente</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="Status" id="Status" value="Finalizado" required>
  <label class="form-check-label" for="Status">Finalizado</label>
</div>
</div>
</div> 
</div>

