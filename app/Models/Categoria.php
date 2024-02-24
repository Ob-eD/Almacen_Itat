<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'IdCategoria';
    protected $fillable = [
        'NombreCategoria',
        'Descripcion',
    ]; 

    public function herramienta()
    {
        return $this->hasOne('App\Models\Herramienta', 'CategoriaIdCategoria', 'IdCategoria');
    }
}
