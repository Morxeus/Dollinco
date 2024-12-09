<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Alumno
 *
 * @property $RunAlumno
 * @property $Nombres
 * @property $Apellidos
 * @property $FechaNacimiento
 * @property $Genero
 * @property $Direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alumno extends Model
{
    protected $primaryKey = 'RunAlumno';
    public $incrementing = false; // Indicamos que no es un campo autoincremental
    protected $keyType = 'string'; // Indicamos que la clave primaria es de tipo string
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['RunAlumno', 'Nombres', 'Apellidos', 'FechaNacimiento', 'Genero', 'Direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'RunAlumno', 'RunAlumno');
    }

    protected static function booted()
    {
        static::deleting(function ($alumno) {
            // Verifica si tiene matrículas relacionadas
            if ($alumno->matriculas()->exists()) {
                throw new Exception("No se puede eliminar el alumno porque tiene registros relacionados en la tabla de matrículas.");
            }
        });
    }
    
}
