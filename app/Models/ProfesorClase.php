<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfesorClase
 *
 * @property $IDProfesorClase
 * @property $IDRegistrodeClase
 * @property $RunProfesor
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosdeClase $registrosdeClase
 * @property ProfesorDirector $profesorDirector
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProfesorClase extends Model
{
    protected $primaryKey = 'IDProfesorClase';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDProfesorClase', 'IDRegistrodeClase', 'RunProfesor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function registrosdeClase()
    {
        return $this->belongsTo(\App\Models\RegistrosdeClase::class, 'IDRegistrodeClase', 'IDRegistrodeClase');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profesorDirector()
    {
        return $this->belongsTo(\App\Models\ProfesorDirector::class, 'RunProfesor', 'RunProfesor');
    }
    
}
