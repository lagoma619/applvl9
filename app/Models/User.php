<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'userid';
    protected $fillable = [
        'numero_documento',
        'id_usuestado',
        'id_tipos_usuario',
        'id_personas',
        'email',
        'password',
        'nota',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function persona(){
        return $this->hasOne(Persona::class,'id','id_personas');
    }
    public function tiposusuario(){
        return $this->hasOne(TiposUsuario::class,'id','id_tipos_usuario');
    }

    public function scopePersonas($query){

       return $query = User::join('personas','personas.id','=', 'users.id_personas')
           ->join('tipos_usuario','tipos_usuario.id','users.id_tipos_usuario')
           ->join('usuario_estados','usuario_estados.id','=','users.id_usuestado')
           ->get();
    }

}
