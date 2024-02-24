<div class="row justify-content-center">
<div class="mb-3 row"> 
    <label for="NombreHerramienta" class="col-form-label">Nombre</label>
    <div class="col-ms-5">
        <input type="text" class="form-control" name="NombreHerramienta" id="NombreHerreamienta" value="{{ ($herramienta->NombreHerramienta) }}" required>
    </div>
</div>
<div class="mb-3 row">
    <label for="CantidadExistente" class="col-form-label">Agregar Unidades</label>
    <div class="col-ms-5">
        <input type="number" class="form-control" name="CantidadExistente" id="CantidadExistente" >
    </div>
</div>

<div class="mb-3 row">
    <label for="CategoriaIdCategoria" class="col-form-label">Categoria</label>
    <div class="col-sm-5">

    <select name="CategoriaIdCategoria" id="CategoriaIdCategoria" class="form-select" required>
        
<option value="">Selecciona Categoria</option>

@foreach($categorias as $categoria)
<option value="{{ $categoria->IdCategoria }}"@if ($categoria->IdCategoria == $herramienta->CategoriaIdCategoria) {{'selected'}} @endif>{{ $categoria->NombreCategoria }}</option>
@endforeach

</select>

</div>
</div>

<div class="col-md-4">
        <img src="{{ asset('Img/'.$herramienta->Img) }}" class="img-fluid rounded-start" alt="{{ $herramienta->Img }}">
</div>
</div>


