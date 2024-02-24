        
        <div class="mb-3 text-white bg-dark">
            <label for="NombreHerramienta" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="NombreHerramienta" name="NombreHerramienta" value="{{old ('NombreHerramienta') }}" required>
          </div>        
          <div class="mb-3 text-white bg-dark">
            <label class="col-form-label" for="CantidadExistentes">Unidades Existentes</label>
                <input type="text" class="form-control" name="CantidadExistente" id="CantidadExistente" value="{{ old ('CantidadDisponible') }}" required>
            </div>

            <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
            <select name="CategoriaIdCategoria" id="CategoriaIdCategoria" class="form-select" required>                
        <option value="">Selecciona Categoria</option>
        @foreach($categorias as $categoria)
        <option value="{{ $categoria->IdCategoria }}">{{ $categoria->NombreCategoria }}</option>
        @endforeach
        </select>
        </div>

        <div class="input-group mb-3">
        <label for="Img" class="col-sm-2 col-form-label">Imagen</label>
  <input type="file" class="form-control" name="Img" id="Img" required>
    </div>

