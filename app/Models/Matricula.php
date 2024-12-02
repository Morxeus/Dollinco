<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['NumeroMatricula', 'RunAlumno', 'RunApoderado', 'FechaInscripcion', 'IDMatriculaEstado'];

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
    public function registrosdeClases()
    {
        return $this->hasMany(\App\Models\RegistrosdeClase::class, 'NumeroMatricula', 'NumeroMatricula');
    }

    /**
     * Relación con el modelo Malla.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mallas()
    {
        return $this->hasMany(\App\Models\Malla::class, 'NumeroMatricula', 'NumeroMatricula');
    }
}

