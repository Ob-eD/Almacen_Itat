<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prestamo
 *
 * @property $IdPrestamo
 * @property $AlumnoNoControl
 * @property $FechaPrestamo
 * @property $HerramientaIdHerramienta
 * @property $CantidadPrestada
 * @property $FechaDevolucion
 * @property $CantiadDevuelta
 * @property $Observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Alumno $alumno
 * @property Herramienta $herramienta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prestamo extends Model
{
    
    static $rules = [
		'IdPrestamo' => 'required',
		'AlumnoNoControl' => 'required',
		'FechaPrestamo' => 'required',
		'HerramientaIdHerramienta' => 'required',
		'CantidadPrestada' => 'required',
		'FechaDevolucion' => 'required',
		'CantiadDevuelta' => 'required',
		'Observaciones' => 'required',
    ];

    protected $perPage = 20;

    protected $primaryKey = 'IdPrestamo';
    protected $forechKey = ['HerramientaIdHerramienta', 'AlumnoNoControl'];
   
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['IdPrestamo','AlumnoNoControl','FechaPrestamo','HerramientaIdHerramienta','CantidadPrestada','FechaDevolucion','CantiadDevuelta','Observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alumno()
    {
        return $this->hasOne('App\Models\Alumno', 'NoControl', 'AlumnoNoControl');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function herramienta()
    {
        return $this->hasOne('App\Models\Herramienta', 'IdHerramienta', 'HerramientaIdHerramienta');
    }
    


}
