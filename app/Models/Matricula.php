<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Matricula
 *
 * @property $NumeroMatricula
 * @property $RunAlumno
 * @property $RunApoderado
 * @property $FechaInscripcion
 * @property $IDMatriculaEstado
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadoMatricula $estadoMatricula
 * @property Alumno $alumno
 * @property Apoderado $apoderado
 * @property Malla[] $mallas
 * @property RegistrosdeClase[] $registrosdeClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Matricula extends Model
{
    protected $primaryKey = 'NumeroMatricula'; // Define la clave primaria
    public $incrementing = false;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['NumeroMatricula', 'RunAlumno', 'RunApoderado', 'FechaInscripcion', 'IDMatriculaEstado'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($matricula) {
            if (empty($matricula->NumeroMatricula)) {
                $year = now()->year;
                $latestMatricula = self::whereYear('created_at', $year)
                    ->orderBy('NumeroMatricula', 'desc')
                    ->first();

                $latestNumber = $latestMatricula
                    ? (int)substr($latestMatricula->NumeroMatricula, 4)
                    : 0;

                $matricula->NumeroMatricula = $year . str_pad($latestNumber + 1, 4, '0', STR_PAD_LEFT);
            }


        });

        static::deleting(function ($matricula) {
            // Verifica si hay relaciones con otras tablas
            if ($matricula->mallas()->exists()) {
                throw new Exception("No se puede eliminar la matrícula porque tiene registros relacionados en la tabla Mallas.");
            }
        });

    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoMatricula()
    {
        return $this->belongsTo(\App\Models\EstadoMatricula::class, 'IDMatriculaEstado', 'IDMatriculaEstado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumno()
    {
        return $this->belongsTo(\App\Models\Alumno::class, 'RunAlumno', 'RunAlumno');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apoderado()
    {
        return $this->belongsTo(\App\Models\Apoderado::class, 'RunApoderado', 'RunApoderado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function registrosdeClases()
    // {
    //     return $this->hasMany(\App\Models\RegistrosdeClase::class, 'NumeroMatricula', 'NumeroMatricula');
    // }

    /**
     * Relación con el modelo Malla.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mallas()
    {
        return $this->hasMany(\App\Models\Malla::class, 'NumeroMatricula', 'NumeroMatricula');
    }

    public function malla()
    {
        return $this->belongsTo(Malla::class, 'NumeroMatricula', 'NumeroMatricula');
    }


}

