<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 *
 * @property $IDAsignatura
 * @property $NombreAsignatura
 * @property $created_at
 * @property $updated_at
 *
 * @property CursoAsignatura[] $cursoAsignaturas
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asignatura extends Model
{
    protected $primaryKey = 'IDAsignatura';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDAsignatura', 'NombreAsignatura'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoAsignaturas()
    {
        return $this->hasMany(\App\Models\Malla::class, 'IDAsignatura', 'IDAsignatura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'IDAsignatura', 'IDAsignatura');
    }
    
}
