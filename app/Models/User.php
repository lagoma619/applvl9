<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $primaryKey = 'userid';
    protected $fillable = [
        'numero_documento',
        'id_usuestado',
        'id_tipos_usuario',
        'email',
        'password',
        'nota',
        'id_persona',
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

    //Autenticación API

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    //


    public function persona(){
       //return $this->belongsTo(Persona::class);
        //,'persona_id','id_personas'
        //{{auth()->id().'. '.auth()->user()->persona()->find(auth()->id())->persona_nombres.' '.auth()->user()->persona()->find(auth()->id())->persona_apellidos.' '}}
        return User::join('personas', 'personas.persona_id','=', 'users.id_persona')->get()->find(auth()->id());
    }
    /*
    public function tiposusuario(){
        return $this->hasOne(TiposUsuario::class,'id','id_tipos_usuario');
    }
*/
    public function scopePersonas($query){

       return $query = User::join('personas', 'personas.persona_id','=', 'users.id_persona')->get();
    }

}
