<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

/**
 * Class Apoderado
 *
 * @property $RunApoderado
 * @property $Nombres
 * @property $Apellidos
 * @property $Correo
 * @property $Telefono
 * @property $Contraseña
 * @property $Genero
 * @property $Direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Matricula[] $matriculas
 * @property ReunionApoderado[] $reunionApoderados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Apoderado extends Model
{
    protected $primaryKey = 'RunApoderado';
    protected $keyType = 'string';
    protected $perPage = 20;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['RunApoderado', 'Nombres', 'Apellidos', 'Correo', 'Telefono', 'Genero', 'Direccion', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matriculas()
    {
        return $this->hasMany(\App\Models\Matricula::class, 'RunApoderado', 'RunApoderado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reunionApoderados()
    {
        return $this->hasMany(\App\Models\ReunionApoderado::class, 'RunApoderado', 'RunApoderado');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($apoderado) {
            // Verificar si tiene relaciones en matriculas o reunionApoderados
            if ($apoderado->matriculas()->exists() || $apoderado->reunionApoderados()->exists()) {
                throw new Exception("No se puede eliminar el apoderado porque tiene registros relacionados.");
            }
        });
    }
    
}
