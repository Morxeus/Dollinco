<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    
}
