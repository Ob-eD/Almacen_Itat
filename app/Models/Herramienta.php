<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Herramienta
 *
 * @property $IdHerramienta
 * @property $NombreHerramienta
 * @property $CantidadDisponible
 * @property $CategoriaIdCategoria
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Prestamo[] $prestamos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Herramienta extends Model
{
    
    static $rules = [
		'IdHerramienta' => 'required',
		'NombreHerramienta' => 'required',
		'CantidadDisponible' => 'required',
		'CategoriaIdCategoria' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'IdHerramienta';
    protected $forechKey = 'CatehoriaIdCategoria';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdHerramienta','NombreHerramienta','CantidadDisponible','CategoriaIdCategoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'IdCategoria', 'CategoriaIdCategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo', 'HerramientaIdHerramienta', 'IdHerramienta');
    }

   
}
