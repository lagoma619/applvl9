<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Persona extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'persona_id';
    protected $fillable = [
        'persona_id_tipo_documento',
        'persona_nombres',
        'persona_apellidos',
        'persona_cel_personal',
        'persona_cel_corporativo',
        'persona_direccion',
        'persona_email',
        'persona_sexo',
        'persona_fecha_nacimiento',
        'persona_ciudad',
        'persona_notapersona',
        'persona_id_tipo_vehiculo',
        'persona_id_cliente'
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
    public function users(){
        return $this->belongsTo(User::class,'userid','persona_id');
    }

    public function tiposdocumento(){
        return $this->hasOne(TipoDocumento::class,'id','id_tipo_documento');
    }


}
