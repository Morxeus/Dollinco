<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfesorDirector
 *
 * @property $RunProfesor
 * @property $Nombres
 * @property $Apellidos
 * @property $Correo
 * @property $Contrasena
 * @property $created_at
 * @property $updated_at
 *
 * @property ProfesorClase[] $profesorClases
 * @property Reunion[] $reunions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProfesorDirector extends Model

{
    protected $primaryKey = 'RunProfesor';
    protected $keyType = 'string'; // Indicamos que la clave primaria es de tipo string
    protected $perPage = 20;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['RunProfesor', 'Nombres', 'Apellidos', 'Correo', 'telefono','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profesorClases()
    {
        return $this->hasMany(\App\Models\ProfesorClase::class, 'RunProfesor', 'RunProfesor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reunions()
    {
        return $this->hasMany(\App\Models\Reunion::class, 'RunProfesor', 'RunProfesor');
    }
    
}
