<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reunion
 *
 * @property $IdReunion
 * @property $TipoReunion
 * @property $FechaInicio
 * @property $FechaFin
 * @property $DescripcionReunion
 * @property $RunProfesor
 * @property $created_at
 * @property $updated_at
 *
 * @property ProfesorDirector $profesorDirector
 * @property ReunionApoderado[] $reunionApoderados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reunion extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IdReunion', 'TipoReunion', 'FechaInicio', 'FechaFin', 'DescripcionReunion', 'RunProfesor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profesorDirector()
    {
        return $this->belongsTo(\App\Models\ProfesorDirector::class, 'RunProfesor', 'RunProfesor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reunionApoderados()
    {
        return $this->hasMany(\App\Models\ReunionApoderado::class, 'IdReunion', 'IDReunion');
    }
    
}
