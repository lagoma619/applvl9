<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    //use HasFactory;
    protected $table = 'domicilios';
    protected $fillable =  [
                'id_estado_domicilio',
                'asignado_a',
                'origen',
                'destino',
                'descripcion',
                'fecha_inicio',
                'fecha_fin',
                'notas',
                'efectivo_entrega',
                'efectivo_monto',
                'id_cliente',
                'id_tipo_vehiculo',
                'id_tipo_servicio',
                'id_userid',
                'fecha_solicitud',
                'fecha_entrega_solicita',
                'hora_entrega_solicita',
                'hora_entrega_real',
    ];
}
