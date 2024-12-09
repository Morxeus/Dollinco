<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Registroclase
 *
 * @property $IdRegistroClases
 * @property $IdMalla
 * @property $FechaClase
 * @property $DescripcionClase
 * @property $created_at
 * @property $updated_at
 *
 * @property Malla $malla
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Registroclase extends Model
{
    protected $primaryKey = 'IdRegistroClases';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IdRegistroClases', 'IdMalla', 'FechaClase', 'DescripcionClase'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function malla()
    {
        return $this->belongsTo(\App\Models\Malla::class, 'IdMalla', 'IdMalla');
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($registroclase) {
            // Verificar si hay una relación con Malla
            if ($registroclase->malla()->exists()) {
                throw new Exception("No se puede eliminar el registro de clase porque está relacionado con una malla.");
            }
        });
    }
}