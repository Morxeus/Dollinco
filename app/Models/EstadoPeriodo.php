<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoPeriodo
 *
 * @property $IDPeriodoE
 * @property $NombreEstado
 * @property $created_at
 * @property $updated_at
 *
 * @property Periodo[] $periodos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadoPeriodo extends Model
{
    
    protected $primaryKey = 'IDPeriodoE'; // Indica que la clave primaria es IDPeriodoE
    public $incrementing = false; // Si la clave primaria no es auto incremental
    protected $keyType = 'string'; // Si el tipo de la clave primaria no es un número entero

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDPeriodoE', 'NombreEstado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodos()
    {
        return $this->hasMany(\App\Models\Periodo::class, 'IDPeriodoE', 'IDPeriodoE');
    }
    
}
