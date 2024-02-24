                        
                <div class="row justify-content-center">
                        <div class="form-group">
                            <strong>Codigo de Herramienta:</strong>
                            {{ $herramienta->IdHerramienta }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $herramienta->NombreHerramienta }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Existente:</strong>
                            {{ $herramienta->CantidadExistente }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Disponible:</strong>
                            {{ $herramienta->CantidadDisponible }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $herramienta->Categoria->NombreCategoria }}
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('Img/'.$herramienta->Img) }}" class="img-fluid img-thumbnail" alt="{{ $herramienta->Img }}" width="200">
                        </div>
                    </div>

