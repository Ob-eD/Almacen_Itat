

    <div class="input-group mb-3"> 
    <label class="input-group-text" for="inputGroupSelect01">Alumno</label>
    
    <select name="AlumnoNoControl" id="AlumnoNoControl" class="form-select" required>
    <option value="">Selecciona Alumno</option>
    @foreach($alumnos as $alumno)
    <option value="{{ $alumno->NoControl }}">{{ $alumno->Nombre }}</option>
    @endforeach
     </select>
    </div>


<div class="input-group mb-3">
<label class="input-group-text" for="inputGroupSelect01">Fecha De Prestamo</label>
        <input type="date" class="form-control" name="FechaPrestamo" id="FechaPrestamo" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" required>
</div>

<div class="row g-3">
<div class="input-group mb-3">
<label class="input-group-text" for="inputGroupSelect01">Herramienta </label>
    <select name="HerramientaIdHerramienta" id="HerramientaIdHerramienta" class="form-select" required>        
    <option value="">Selecciona Herramienta </option>
    @foreach($herramientas as $herramienta)
    <option value="{{ $herramienta->IdHerramienta }}">{{ $herramienta->NombreHerramienta }} disponibles: {{ $herramienta->CantidadDisponible }}</option>
    @endforeach
   </select>
</div>



<div class="input-group mb-3">
<label class="input-group-text" for="inputGroupSelect01">Cantidad Prestada</label>    
        <input type="hidden" name="CantidadPrestada" value=" {{ $herramienta->IdHerramienta }}" required>
        <input type="number" name="CantidadPrestada" id="CantdadPrestada" min="1" max="{{ $herramienta->CantidadDisponible }}">    
</div>
</div>


<div class="mb-3 text-white bg-dark">
            <label for="Observaciones" class="col-form-label">Observaciones</label>
            <textarea class="form-control" id="Observaciones" name="Observaciones" rows="3" value="{{old ('Observaciones') }}" ></textarea>
          </div>

<div class="mb-3 text-white bg-dark">
<div class="form-check">
  <input class="form-check-input" type="radio" name="Status" id="Status" value="Pendiente" checked>
  <label class="form-check-label" for="Status">
    Pendiente
  </label>
</div>
</div>

<script>
$(document).ready(function() {
    $('#load-herramientas').click(function() {
        $.get('{{ route('prestamo.index') }}', function(data) {
            let table = $('<table></table>');
            table.append('<tr><th>Nombre</th><th>Unidades</th></tr>');
            data.forEach(function(herramienta) {
                table.append('<tr><td>' + herramienta.IdHerramienta + '</td><td>' + herramienta.CantidadDisponible + '</td></tr>');
            });
            $('#herramientas-table').html(table);
        });
    });

    // ... aquí puedes agregar el código para enviar el formulario de préstamo usando Ajax
});
</script>
