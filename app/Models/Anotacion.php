<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Anotacion
 *
 * @property $IdAnotacion
 * @property $TipoAnotacion
 * @property $DescripcionAnotacion
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosdeClase[] $registrosdeClases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Anotacion extends Model
{
    protected $primaryKey = 'IdAnotacion';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     protected $fillable = ['IdAnotacion', 'TipoAnotacion', 'DescripcionAnotacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleRegistroClase()
    {
        return $this->belongsTo(DetalleRegistroClase::class, 'IdDetalleRegistroClase', 'IdDetalleRegistroClase');
    }

    
    
}