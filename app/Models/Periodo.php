<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Periodo
 *
 * @property $IDPeriodo
 * @property $FechaInicio
 * @property $FechaFin
 * @property $IDPeriodoE
 * @property $created_at
 * @property $updated_at
 *
 * @property EstadoPeriodo $estadoPeriodo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Periodo extends Model
{
    
    
    protected $primaryKey = 'IDPeriodo'; // Define la clave primaria

    protected $perPage = 20;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDPeriodo', 'FechaInicio', 'FechaFin', 'IDPeriodoE'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoPeriodo()
    {
        return $this->belongsTo(\App\Models\EstadoPeriodo::class, 'IDPeriodoE', 'IDPeriodoE');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($periodo) {

            if ($periodo->estadoPeriodo()->exists()) {
                throw new Exception("No se puede eliminar el periodo porque tiene un estado relacionado.");
            }

        });
    }
    
}
