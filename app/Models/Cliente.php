<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //use HasFactory;
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'nombre_comercial',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'inicio_contrato',
        'correo_electronico',
        'direccion',
        'ciudad',
        'contacto',
        'telefono_contacto',
        'horario_inicio',
        'horario_fin',
        'pagina_web',
        'numero_telefono',
        'notas',
        'estado',
        ];

}
