<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    //use HasFactory;
    protected $table = 'domicilios';
    protected $primaryKey = 'domicilio_id';
    protected $fillable =  [
                'domicilio_id_estado_domicilio',
                'domicilio_asignado_a',
                'domicilio_origen',
                'domicilio_destino',
                'domicilio_descripcion',
                'domicilio_fecha_inicio',
                'domicilio_fecha_fin',
                'domicilio_notas',
                'domicilio_efectivo_entrega',
                'domicilio_efectivo_monto',
                'domicilio_id_cliente',
                'domicilio_id_tipo_vehiculo',
                'domicilio_id_tipo_servicio',
                'domicilio_id_userid',
                'domicilio_fecha_solicitud',
                'domicilio_fecha_entrega_solicita',
                'domicilio_hora_entrega_solicita',
                'domicilio_hora_entrega_real',
    ];
}
