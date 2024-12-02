<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $IDCurso
 * @property $Año
 * @property $NombreCurso
 * @property $created_at
 * @property $updated_at
 *
 * @property CursoAsignatura[] $cursoAsignaturas
 * @property CursoOfrecido[] $cursoOfrecidos
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    protected $primaryKey = 'IDCurso';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDCurso', 'Año', 'NombreCurso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoAsignaturas()
    {
        return $this->hasMany(\App\Models\Malla::class, 'IDCurso', 'IDCurso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoOfrecidos()
    {
        return $this->hasMany(\App\Models\CursoOfrecido::class, 'IDCurso', 'IDCurso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'IDCurso', 'IDCurso');
    }
    
}
