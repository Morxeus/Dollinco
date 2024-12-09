<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Curso
 *
 * @property $IDCurso
 * @property $Año
 * @property $NombreCurso
 * @property $created_at
 * @property $updated_at
 *
 * @property CursoAsignatura[] $cursoAsignaturas
 * @property CursoOfrecido[] $cursoOfrecidos
 * @property Matricula[] $matriculas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    protected $primaryKey = 'IDCurso';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDCurso', 'Año', 'NombreCurso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoAsignaturas()
    {
        return $this->hasMany(\App\Models\Malla::class, 'IDCurso', 'IDCurso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursoOfrecidos()
    {
        return $this->hasMany(\App\Models\CursoOfrecido::class, 'IDCurso', 'IDCurso');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'IDCurso', 'IDCurso');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
        public function mallas()
    {
        return $this->hasMany(\App\Models\Malla::class, 'IdCurso', 'IDCurso');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($curso) {
            // Verificar si hay relaciones en cursoAsignaturas, cursoOfrecidos, matriculas o mallas
            if (
                $curso->cursoAsignaturas()->exists() ||
                $curso->cursoOfrecidos()->exists() ||
                $curso->matriculas()->exists() ||
                $curso->mallas()->exists()
            ) {
                throw new Exception("No se puede eliminar el curso porque tiene registros relacionados en otras tablas.");
            }
        });
    }

}
