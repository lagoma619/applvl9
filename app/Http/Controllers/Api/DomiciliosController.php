<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Domicilio;
use App\Models\TipoServicio;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return $domicilios;
    }

    public function misDomicilios(Request $request)
    {

        $userid = $request->only('userid');

        $domicilios = Domicilio::orderBy('domicilios.domicilio_fecha_entrega_solicita','asc')
            ->where('domicilio_id_estado_domicilio','=',2)
            ->join('clientes','clientes.cliente_id','domicilios.domicilio_id_cliente')
            ->join('domicilios_estados','domicilios_estados.domiestado_id','domicilios.domicilio_id_estado_domicilio')
            ->join('tipos_servicio', 'tipos_servicio.tiposervicio_id','domicilios.domicilio_id_tipo_servicio')
            ->join('tipos_vehiculo','tipos_vehiculo.tipovehiculo_id','domicilios.domicilio_id_tipo_vehiculo')
            ->where('domicilio_asignado_a',$userid)
            ->get();

        return $domicilios;
    }

    public function tiposServicios()
    {
        return TipoServicio::all();
    }
    public function tiposVehiculos()
    {
        return Vehiculo::all();
    }

    public function nuevoDomicilio(Request $request)
    {
        $origen1 = $request->input('domicilio_origen1');
        $origen2 = $request->input('domicilio_origen2');
        $destino1 = $request->input('domicilio_destino1');
        $destino2 = $request->input('domicilio_destino2');

        //ESTABLECE ORIGEN
        if (!empty($origen1) || !empty($origen2)){
            if ($origen2){
                $request['domicilio_origen'] = $origen2;
            } elseif ($origen1){
                $request['domicilio_origen'] = $origen1;
            }
        }

        //ESTABLECE DESTINO
        if (!empty($destino1) || !empty($destino2)){
            if ($destino2){
                $request['domicilio_destino'] = $destino2;
                ;
            } elseif ($destino1){
                $request['domicilio_destino'] = $destino1;
            }
        }
        //ESTADO DOMICILIO: SIN ASIGNAR

        /*
        $asignado = $request->input('domicilio_asignado_a');
        if (!empty($asignado)){
            $domicilio['domicilio_id_estado_domicilio'] = 2; //EN CURSO
        } else {
            $domicilio['domicilio_id_estado_domicilio'] = 1; //SIN ASIGNAR
        }
        */


        //ESTABLECE CLIENTE QUE SOLICITA DOMICILIO
        /*
        $personaactual = User::join('personas', 'persona_id','=', 'id_persona')->where('persona_id',auth()->id())->get('persona_id_cliente');
        $clientesolicita = Cliente::all()->where('cliente_id','=',$personaactual[0]->persona_id_cliente);
        $request['domicilio_id_cliente'] = $clientesolicita[1]->cliente_id;
        */

        //dd($request['domicilio_id_cliente']);


        //dd($request);
        $domicilio = DB::transaction(function () use ($request){
            $domicilio = Domicilio::create($request->all());
           return $domicilio;
        });
        $domicilio_id = $domicilio->domicilio_id;

        return response()->json([
            'domicilio_id' => $domicilio_id
        ]);

    }

}
