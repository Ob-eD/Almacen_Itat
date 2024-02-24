
@if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
    <div class="mb-3 text-white bg-dark">
            <label for="NoControl" class="col-form-label">No Control:</label>
            <input type="text" class="form-control" id="NoControl" name="NoControl" value="{{old ('NoControl') }}" required>
          </div>
        
    <div class="mb-3 text-white bg-dark">
             <label for="Nombre" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{old ('Nombre') }}" required>
          </div>
    
    <div class="mb-3 text-white bg-dark">
            <label for="Grupo" class="col-form-label">Grupo:</label>
            <input type="text" class="form-control" id="Grupo" name="Grupo" value="{{old ('Grupo') }}" required>
          </div>
    
    <div class="mb-3 text-white bg-dark">
            <label for="Semestre" class="col-form-label">Semestre:</label>
            <input type="text" class="form-control" id="Semestre" name="Semestre" value="{{old ('Semestre') }}" required>
          </div>
        
    <div class="mb-3 text-white bg-dark">
            <label for="Carrera" class="col-form-label">Carrera:</label>
            <input type="text" class="form-control" id="Carrera" name="Carrera" value="{{old ('Carrera') }}" required>
          </div>
        
    <div class="mb-3 text-white bg-dark">
            <label for="Correo" class="col-form-label">Correo:</label>
            <input type="email" class="form-control" id="Correo" name="Correo" value="{{old ('Correo') }}" required>
          </div>
    
    <div class="mb-3 text-white bg-dark">
            <label for="Telefono" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" pattern="[0-9]{10}" value="{{old ('Telefono') }}" required>
          </div>