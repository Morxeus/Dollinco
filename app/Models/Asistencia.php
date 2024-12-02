<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $IDAsistencia
 * @property $Fecha
 * @property $EstadoAsistencia
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosdeClase[] $registrosdeClases
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
    protected $fillable = ['IDAsistencia', 'Fecha', 'EstadoAsistencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosdeClases()
    {
        return $this->hasMany(\App\Models\RegistrosdeClase::class, 'IDAsistencia', 'IDAsistencia');
    }
    
}
