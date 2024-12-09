<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

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
    protected $primaryKey = 'IdReunion';
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
    

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($reunion) {
            // Verificar si hay relaciones en ReunionApoderado
            if ($reunion->reunionApoderados()->exists()) {
                throw new Exception("No se puede eliminar la reunión porque tiene registros relacionados en la tabla de ReunionApoderado.");
            }
        });
    }


}
