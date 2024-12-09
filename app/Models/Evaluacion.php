<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Evaluacion
 *
 * @property $IdEvaluacion
 * @property $NombreEvaluacion
 * @property $DescripcionEvaluacion
 * @property $FechaEvaluacion
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosdeClase[] $registrosdeClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evaluacion extends Model
{
    protected $primaryKey = 'IdEvaluacion';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IdEvaluacion', 'NombreEvaluacion', 'DescripcionEvaluacion', 'FechaEvaluacion'];


    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function registrosdeClases()
    // {
    //     return $this->hasMany(\App\Models\RegistrosdeClase::class, 'IdEvaluacion', 'IDEvaluacion');
    // }
    
}
