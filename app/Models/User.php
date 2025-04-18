<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * Los atributos que se pueden asignar de forma masiva.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'language',
    ];

    /**
     * Los atributos que deberían ser ocultados para los arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Cambia el idioma del usuario.
     *
     * @param string $language
     * @return void
     */
    public function setLanguage($language)
    {
        $this->update(['language' => $language]);
    }
}