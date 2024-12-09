<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Asistencia
 *
 * @property $IDAsistencia
 * @property $Fecha
 * @property $EstadoAsistencia
 * @property $created_at
 * @property $updated_at
 *
 * @property DetalleRegistroClase[] $detalleRegistroClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    protected $primaryKey = 'IDAsistencia';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDAsistencia', 'EstadoAsistencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleRegistroClases()
    {
        return $this->hasMany(DetalleRegistroClase::class, 'IdAsistencia', 'IDAsistencia');
    }



    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($asistencia) {
            // Verificar si hay relaciones con registrosdeClases
            if ($asistencia->detalleRegistroClases()->exists()) {
                throw new Exception("No se puede eliminar la asistencia porque tiene registros relacionados en la tabla RegistrosdeClase.");
            }
        });
    }
    
}
