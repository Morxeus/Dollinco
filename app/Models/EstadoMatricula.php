<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoMatricula
 *
 * @property $IDMatriculaEstado
 * @property $EstadoMatricula
 * @property $created_at
 * @property $updated_at
 *
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadoMatricula extends Model
{
    protected $primaryKey = 'IDMatriculaEstado';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDMatriculaEstado', 'EstadoMatricula'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'IDMatriculaEstado', 'IDMatriculaEstado');
    }
    
}
