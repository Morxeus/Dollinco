<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class CursoOfrecido
 *
 * @property $IDCursoOfrecido
 * @property $Año
 * @property $IDCurso
 * @property $Letra
 * @property $Cupos
 * @property $IDPeriodo
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @property Periodo $periodo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CursoOfrecido extends Model
{
    protected $primaryKey = 'IDCursoOfrecido';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDCursoOfrecido', 'Año', 'IDCurso', 'Letra', 'Cupos', 'IDPeriodo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'IDCurso', 'IDCurso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function periodo()
    {
        return $this->belongsTo(\App\Models\Periodo::class, 'IDPeriodo', 'IDPeriodo');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($cursoOfrecido) {
            // Si tiene relaciones con Curso o Periodo, evitar la eliminación
            if ($cursoOfrecido->curso()->exists() || $cursoOfrecido->periodo()->exists()) {
                throw new Exception("No se puede eliminar el CursoOfrecido porque tiene relaciones con Curso o Periodo.");
            }
        });
    }
    
}
