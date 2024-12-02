<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReunionApoderado
 *
 * @property $IDReunionApoderado
 * @property $Asistencia
 * @property $HoraInicioReunionApoderado
 * @property $HoraFinReunionApoderado
 * @property $RunApoderado
 * @property $IDReunion
 * @property $created_at
 * @property $updated_at
 *
 * @property Reunion $reunion
 * @property Apoderado $apoderado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ReunionApoderado extends Model
{
    protected $primaryKey = 'IDReunionApoderado';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['IDReunionApoderado', 'Asistencia', 'HoraInicioReunionApoderado', 'HoraFinReunionApoderado', 'RunApoderado', 'IDReunion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reunion()
    {
        return $this->belongsTo(\App\Models\Reunion::class, 'IDReunion', 'IDReunion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apoderado()
    {
        return $this->belongsTo(\App\Models\Apoderado::class, 'RunApoderado', 'RunApoderado');
    }
    
}
