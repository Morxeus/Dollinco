<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReunionApoderado
 *
 * @property $IdReunionApoderado
 * @property $Asistencia
 * @property $RunApoderado
 * @property $IdReunion
 * @property $IdMalla
 * @property $created_at
 * @property $updated_at
 *
 * @property Malla $malla
 * @property Reunion $reunion
 * @property Apoderado $apoderado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReunionApoderado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IdReunionApoderado', 'Asistencia', 'RunApoderado', 'IdReunion', 'IdMalla'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function malla()
    {
        return $this->belongsTo(\App\Models\Malla::class, 'IdMalla', 'IdMalla');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reunion()
    {
        return $this->belongsTo(\App\Models\Reunion::class, 'IdReunion', 'IdReunion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apoderado()
    {
        return $this->belongsTo(\App\Models\Apoderado::class, 'RunApoderado', 'RunApoderado');
    }
    
}
