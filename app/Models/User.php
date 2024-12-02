<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function adminlte_image(){
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){
                // Obtén el primer rol del usuario
                $role = $this->roles->first();

                // Devuelve una descripción basada en el rol
                switch ($role?->name) {
                    case 'administrador':
                        return 'Administrador';
                    case 'profesor':
                        return 'Profesor';
                    case 'apoderado':
                        return 'Apoderado';
                    default:
                        return 'Usuario del sistema';
                }
    }

    
}
