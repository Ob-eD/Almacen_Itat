<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alumno
 *
 * @property $NoControl
 * @property $Nombre
 * @property $Grupo
 * @property $Semestre
 * @property $Carrera
 * @property $Correo
 * @property $Telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Prestamo[] $prestamos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    
    static $rules = [
		'NoControl' => 'required',
		'Nombre' => 'required',
		'Grupo' => 'required',
		'Semestre' => 'required',
		'Carrera' => 'required',
		'Correo' => 'required',
		'Telefono' => 'required',
    ];

    protected $primaryKey = 'NoControl';

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['NoControl','Nombre','Grupo','Semestre','Carrera','Correo','Telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo', 'AlumnoNoControl', 'NoControl');
    }
    

}
