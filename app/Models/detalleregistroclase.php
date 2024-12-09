<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Detalleregistroclase
 *
 * @property $IdDetalleRegistroClase
 * @property $NotaEvaluacion
 * @property $IdRegistroClases
 * @property $NumeroMatricula
 * @property $IdEvaluacion
 * @property $IdAnotacion
 * @property $IdAsistencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Anotacion $anotacion
 * @property Asistencia $asistencia
 * @property Evaluacion $evaluacion
 * @property Registroclase $registroclase
 * @property Matricula $matricula
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Detalleregistroclase extends Model
{
    
    protected $primaryKey = 'IdDetalleRegistroClase';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IdDetalleRegistroClase', 'NotaEvaluacion', 'IdRegistroClases', 'NumeroMatricula', 'IdEvaluacion', 'IdAsistencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anotacion()
    {
        return $this->belongsTo(\App\Models\Anotacion::class, 'IdAnotacion', 'IdAnotacion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asistencia()
    {
        return $this->belongsTo(\App\Models\Asistencia::class, 'IdAsistencia', 'IDAsistencia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evaluacion()
    {
        return $this->belongsTo(\App\Models\Evaluacion::class, 'IdEvaluacion', 'IdEvaluacion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function registroclase()
    {
        return $this->belongsTo(\App\Models\Registroclase::class, 'IdRegistroClases', 'IdRegistroClases');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matricula()
    {
        return $this->belongsTo(\App\Models\Matricula::class, 'NumeroMatricula', 'NumeroMatricula');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($detalleregistroclase) {
            if (
                $detalleregistroclase->anotacion()->exists() ||
                $detalleregistroclase->asistencia()->exists() ||
                $detalleregistroclase->evaluacion()->exists()
            ) {
                throw new Exception("No se puede eliminar el detalle del registro de clase porque tiene relaciones con anotaciones, asistencias o evaluaciones.");
            }
        });
    }
    
}
