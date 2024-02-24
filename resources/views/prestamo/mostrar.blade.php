

                        <div class="form-group">
                            <strong>Id Prestamo:</strong>
                            {{ $prestamo->IdPrestamo }}
                        </div>
                        <div class="form-group">
                            <strong>Alumno:</strong>
                            {{ $prestamo->Alumno->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Prestamo:</strong>
                            {{ $prestamo->FechaPrestamo }}
                        </div>
                        <div class="form-group">
                            <strong>Herramienta:</strong>
                            {{ $prestamo->Herramienta->NombreHerramienta }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Prestada:</strong> 
                            {{ $prestamo->CantidadPrestada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Devolucion:</strong>
                            {{ $prestamo->FechaDevolucion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantiad Devuelta:</strong>
                            {{ $prestamo->CantidadDevuelta }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $prestamo->Observaciones }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $prestamo->Status }}
                        </div>
