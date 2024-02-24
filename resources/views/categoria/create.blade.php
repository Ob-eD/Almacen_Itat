<div class="mb-3 text-white bg-dark">
            <label for="NombreCategoria" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="NombreCategoria" name="NombreCategoria" value="{{old ('NombreCategoria') }}" required>
          </div>
          <div class="mb-3 text-white bg-dark">
            <label for="Descripcion" class="col-form-label">Descripcion:</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" value="{{old ('Descripcion') }}" required></textarea>
          </div>