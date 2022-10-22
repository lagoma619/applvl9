<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domicilio;

class DomiciliosController extends Controller
{
    public function __invoke()
    {

    }

    public function index()
    {

        $domicilios = Domicilio::orderBy('domicilios.domicilio_fecha_entrega_solicita','asc')
            ->where('domicilio_id_estado_domicilio','=',1)
            ->join('clientes','clientes.cliente_id','domicilios.domicilio_id_cliente')
            ->join('domicilios_estados','domicilios_estados.domiestado_id','domicilios.domicilio_id_estado_domicilio')
            ->join('tipos_servicio', 'tipos_servicio.tiposervicio_id','domicilios.domicilio_id_tipo_servicio')
            ->join('tipos_vehiculo','tipos_vehiculo.tipovehiculo_id','domicilios.domicilio_id_tipo_vehiculo')->get();

        //return $domicilios;
        //dd($domicilios);
        //return $domicilios;
        //dd($domicilios);
        //return Domicilio::all()->toJson();
        return $domicilios;
    }
    public function misDomicilios()
    {

        $domicilios = Domicilio::orderBy('domicilios.domicilio_fecha_entrega_solicita','asc')
            ->where('domicilio_id_estado_domicilio','=',1)
            ->join('clientes','clientes.cliente_id','domicilios.domicilio_id_cliente')
            ->join('domicilios_estados','domicilios_estados.domiestado_id','domicilios.domicilio_id_estado_domicilio')
            ->join('tipos_servicio', 'tipos_servicio.tiposervicio_id','domicilios.domicilio_id_tipo_servicio')
            ->join('tipos_vehiculo','tipos_vehiculo.tipovehiculo_id','domicilios.domicilio_id_tipo_vehiculo')->get();

        //return $domicilios;
        //dd($domicilios);
        //return $domicilios;
        //dd($domicilios);
        //return Domicilio::all()->toJson();
        return $domicilios;
    }
}
