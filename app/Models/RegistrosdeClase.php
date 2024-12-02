<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistrosdeClase
 *
 * @property $IDRegistrodeClase
 * @property $IDCursoAsignatura
 * @property $NumeroMatricula
 * @property $IDEvaluacion
 * @property $IDAsistencia
 * @property $IDAnotacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Anotacion $anotacion
 * @property Asistencia $asistencia
 * @property CursoAsignatura $cursoAsignatura
 * @property Evaluacion $evaluacion
 * @property Matricula $matricula
 * @property ProfesorClase[] $profesorClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RegistrosdeClase extends Model
{
    protected $primaryKey = 'IDRegistrodeClase';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDRegistrodeClase', 'IDCursoAsignatura', 'NumeroMatricula', 'IDEvaluacion', 'IDAsistencia', 'IDAnotacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anotacion()
    {
        return $this->belongsTo(\App\Models\Anotacion::class, 'IDAnotacion', 'IDAnotacion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asistencia()
    {
        return $this->belongsTo(\App\Models\Asistencia::class, 'IDAsistencia', 'IDAsistencia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cursoAsignatura()
    {
        return $this->belongsTo(\App\Models\Malla::class, 'IDCursoAsignatura', 'IDCursoAsignatura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluacion()
    {
        return $this->belongsTo(\App\Models\Evaluacion::class, 'IDEvaluacion', 'IDEvaluacion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matricula()
    {
        return $this->belongsTo(\App\Models\Matricula::class, 'NumeroMatricula', 'NumeroMatricula');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profesorClases()
    {
        return $this->hasMany(\App\Models\ProfesorClase::class, 'IDRegistrodeClase', 'IDRegistrodeClase');
    }
    
}
