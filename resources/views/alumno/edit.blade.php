
  <div class="row justify-content-center">                         
        
    <div class="mb-3 row">
             <label for="Nombre" class="col-form-label">Nombre:</label>
             <div class="col-ms-5">
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $alumno->Nombre }}" required>
          </div>
        </div>
    
    <div class="mb-3 row">
            <label for="Grupo" class="col-sm-2 col-form-label">Grupo:</label>
            <div class="col-ms-5">
            <input type="text" class="form-control" id="Grupo" name="Grupo" value="{{ $alumno->Grupo }}" required>
          </div>
        </div>
    
    <div class="mb-3 row">
            <label for="Semestre" class="col-form-label">Semestre:</label>
            <div class="col-ms-5">
            <input type="text" class="form-control" id="Semestre" name="Semestre" value="{{ $alumno->Semestre }}" required>
          </div>
        </div>
        
    <div class="mb-3 row">
            <label for="Carrera" class="col-form-label">Carrera:</label>
            <div class="col-ms-5">
            <input type="text" class="form-control" id="Carrera" name="Carrera" value="{{ $alumno->Carrera }}" required>
          </div>
        </div>
        
    <div class="mb-3 row">
            <label for="Correo" class="col-form-label">Correo:</label>
            <div class="col-ms-5">
            <input type="email" class="form-control" id="Correo" name="Correo" value="{{ $alumno->Correo }}" required>
          </div>
        </div> 
    
    <div class="mb-3 row">
    <div class="col-ms-5">
            <label for="Telefono" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ $alumno->Telefono }}" required>
          </div> 
        </div>
</div>

     
        
                    