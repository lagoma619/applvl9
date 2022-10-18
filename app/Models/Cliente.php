<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'cliente_id';
    protected $fillable = [
        'cliente_nombre',
        'cliente_nombre_comercial',
        'cliente_id_tipo_documento',
        'cliente_numero_documento',
        'cliente_telefono',
        'cliente_inicio_contrato',
        'cliente_email',
        'cliente_direccion',
        'cliente_ciudad',
        'cliente_contacto',
        'cliente_telefono_contacto',
        'cliente_horario_inicio',
        'cliente_horario_fin',
        'cliente_pagina_web',
        'cliente_notas',
        'cliente_id_estado',
        ];

    public function sedes(){
        return $this->hasMany(CliSede::class);
    }
}
