<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Anotacion
 *
 * @property $IDAnotacion
 * @property $TipoAnotacion
 * @property $Fecha
 * @property $Descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosdeClase[] $registrosdeClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anotacion extends Model
{
    protected $primaryKey = 'IDAnotacion';
    protected $perPage = 20;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDAnotacion', 'TipoAnotacion', 'Fecha', 'Descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosdeClases()
    {
        return $this->hasMany(\App\Models\RegistrosdeClase::class, 'IDAnotacion', 'IDAnotacion');
    }
    
}
