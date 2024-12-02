<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Malla
 *
 * @property $IdMalla
 * @property $NombreMalla
 * @property $IdCurso
 * @property $IdAsignatura
 * @property $NumeroMatricula
 * @property $RunProfesor
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignatura $asignatura
 * @property Curso $curso
 * @property Matricula $matricula
 * @property ProfesorDirector $profesorDirector
 * @property RegistrosdeClase[] $registrosdeClases
 * @property ReunionApoderado[] $reunionApoderados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Malla extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IdMalla', 'NombreMalla', 'IdCurso', 'IdAsignatura', 'NumeroMatricula', 'RunProfesor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignatura()
    {
        return $this->belongsTo(\App\Models\Asignatura::class, 'IdAsignatura', 'IDAsignatura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'IdCurso', 'IDCurso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matricula()
    {
        return $this->belongsTo(\App\Models\Matricula::class, 'NumeroMatricula', 'NumeroMatricula');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profesorDirector()
    {
        return $this->belongsTo(\App\Models\ProfesorDirector::class, 'RunProfesor', 'RunProfesor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosdeClases()
    {
        return $this->hasMany(\App\Models\RegistrosdeClase::class, 'IdMalla', 'IdMalla');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reunionApoderados()
    {
        return $this->hasMany(\App\Models\ReunionApoderado::class, 'IdMalla', 'IdMalla');
    }
    
}
