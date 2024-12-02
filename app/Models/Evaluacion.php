<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evaluacion
 *
 * @property $IDEvaluacion
 * @property $FechaEvaluacion
 * @property $Nota
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosdeClase[] $registrosdeClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evaluacion extends Model
{
    protected $primaryKey = 'IDEvaluacion';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDEvaluacion', 'FechaEvaluacion', 'Nota'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosdeClases()
    {
        return $this->hasMany(\App\Models\RegistrosdeClase::class, 'IDEvaluacion', 'IDEvaluacion');
    }
    
}
