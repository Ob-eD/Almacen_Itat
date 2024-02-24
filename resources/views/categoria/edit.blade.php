
                <div class="row justify-content-center">      

                    <div class="form-group">
                        <label for="NombreCategoria">Nombre de Categoria</label>
                        <input type="text" class="form-control" id="NombreCategoria" name="NombreCategoria"
                            value="{{ $categoria->NombreCategoria }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Descripcion</label>
                        <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" required>{{ $categoria->Descripcion }}</textarea>
                    </div>

     
            </div>
                   
            