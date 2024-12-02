<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Malla
 *
 * @property $IDCursoAsignatura
 * @property $IDCurso
 * @property $IDAsignatura
 * @property $NumeroMatricula
 * @property $created_at
 * @property $updated_at
 *
 * @property Asignatura $asignatura
 * @property Curso $curso
 * @property Matricula $matricula
 * @property RegistrosdeClase[] $registrosdeClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Malla extends Model
{
    protected $primaryKey = 'IDCursoAsignatura';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDCursoAsignatura', 'IDCurso', 'IDAsignatura', 'NumeroMatricula'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignatura()
    {
        return $this->belongsTo(\App\Models\Asignatura::class, 'IDAsignatura', 'IDAsignatura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'IDCurso', 'IDCurso');
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
    public function registrosdeClases()
    {
        return $this->hasMany(\App\Models\RegistrosdeClase::class, 'IDCursoAsignatura', 'IDCursoAsignatura');
    }
    
}
