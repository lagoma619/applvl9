<?php

namespace App\Http\Controllers\Domicilio;

use App\Http\Controllers\Controller;
use App\Models\CliArea;
use App\Models\Cliente;
use App\Models\CliSede;
use App\Models\Domicilio;
use App\Models\Persona;
use App\Models\TipoServicio;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Exception\TimeSourceException;
use function PHPUnit\Framework\isEmpty;

class DomicilioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function index()
    {
        $domicilios = Domicilio::orderBy('domicilios.domicilio_fecha_entrega_solicita','asc')
            ->join('clientes','clientes.cliente_id','domicilios.domicilio_id_cliente')
            ->join('domicilios_estados', 'domicilios_estados.domiestado_id', 'domicilios.domicilio_id_estado_domicilio')
            ->join('tipos_servicio', 'tipos_servicio.tiposervicio_id','domicilios.domicilio_id_tipo_servicio')
            ->join('tipos_vehiculo','tipos_vehiculo.tipovehiculo_id','domicilios.domicilio_id_tipo_vehiculo')->get()->all();



        return view('domicilios.index', compact('domicilios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $usuarios = User::orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_persona')
            ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
            ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
            ->get()->all();
        $mensajeros = User::where('id_tipos_usuario','=',1)->orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_persona')
            ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
            ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
            ->get()->all();

        //CONSULTA AREAS ASIGNADAS AL USUARIO QUE SOLICITA
        $personaactual = User::join('personas', 'id_persona','=', 'persona_id')->where('id_persona',auth()->id())->get('persona_id_cliente');
        $areas = CliArea::all()->where('area_id_cliente','=',$personaactual[0]->persona_id_cliente);

        $clientes = Cliente::all();
        $sedes = CliSede::all();
        //$areas = CliArea::all();
        //dd($areas);
        $tipovehiculos = Vehiculo::all();
        $tiposervicios = TipoServicio::all();

        return view('domicilios.create')->with(compact('usuarios', 'tipovehiculos', 'clientes', 'sedes', 'areas','tiposervicios','mensajeros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //
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


        if ($request['domicilio_asignado_a']){
            $request['domicilio_id_estado_domicilio'] = 2;
        } else {
            $request['domicilio_id_estado_domicilio'] = 1;
        }


        //ESTABLECE CLIENTE QUE SOLICITA DOMICILIO
        $personaactual = User::join('personas', 'persona_id','=', 'id_persona')->where('persona_id',auth()->id())->get('persona_id_cliente');
        $clientesolicita = Cliente::all()->where('cliente_id','=',$personaactual[0]->persona_id_cliente);
        $request['domicilio_id_cliente'] = $clientesolicita[1]->cliente_id;

        //dd($request['domicilio_id_cliente']);


        //dd($request);
        DB::transaction(function () use ($request){
            $domicilio = Domicilio::create($request->all());
        });
        $notification = 'El domicilio se ha creado correctamente.';

        return redirect(route('domicilios.index'))->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($domicilioestado)
    {
        $domicilios = Domicilio::orderBy('domicilios.domicilio_fecha_entrega_solicita','asc')
            ->join('clientes','clientes.cliente_id','domicilios.domicilio_id_cliente')
            ->join('domicilios_estados', 'domicilios_estados.domiestado_id', 'domicilios.domicilio_id_estado_domicilio')
            ->join('tipos_servicio', 'tipos_servicio.tiposervicio_id','domicilios.domicilio_id_tipo_servicio')
            ->join('tipos_vehiculo','tipos_vehiculo.tipovehiculo_id','domicilios.domicilio_id_tipo_vehiculo')
            ->where('domicilio_id_estado_domicilio','=', $domicilioestado)->get()->all();

        return view('domicilios.index', compact('domicilios'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $domicilio = Domicilio::all()->find($id);
        $usuarios = User::orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_persona')
            ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
            ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
            ->get()->all();
        $mensajeros = User::where('id_tipos_usuario','=',1)->orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_persona')
            ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
            ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
            ->get()->all();

        //CONSULTA AREAS ASIGNADAS AL USUARIO QUE SOLICITA
        $personaactual = User::join('personas', 'id_persona','=', 'id_persona')->where('id_persona',auth()->id())->get('persona_id_cliente');
        $areas = CliArea::all()->where('area_id_cliente','=',$personaactual[0]->persona_id_cliente);

        $clientes = Cliente::all();
        $sedes = CliSede::all();
        $tipovehiculos = Vehiculo::all();
        //dd($tipovehiculos);
        $tiposervicios = TipoServicio::all();

        //dd($domicilio->domicilio_id_tipo_vehiculo);

        return view('domicilios.edit')->with(compact('domicilio','usuarios', 'tipovehiculos', 'clientes', 'sedes', 'areas','tiposervicios','mensajeros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $domicilio = Domicilio::find($id);

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
        //ESTABLECE ESTADO DEL DOMICILIO
        $asignado = $request->input('domicilio_asignado_a');
        if (!empty($asignado)){
            $domicilio['domicilio_id_estado_domicilio'] = 2; //EN CURSO
        } else {
            $domicilio['domicilio_id_estado_domicilio'] = 1; //SIN ASIGNAR
        }

        //$domicilio['domicilio_id_estado_domicilio'] =request('domicilio_id_estado_domicilio');
        $domicilio['domicilio_asignado_a']=request('domicilio_asignado_a');
        $domicilio['domicilio_origen'] =request('domicilio_origen' );
        $domicilio['domicilio_destino'] =request('domicilio_destino' );
        $domicilio['domicilio_descripcion'] =request('domicilio_descripcion' );
        $domicilio['domicilio_fecha_inicio'] =request('domicilio_fecha_inicio' );
        $domicilio['domicilio_hora_inicio'] =request('domicilio_hora_inicio' );
        $domicilio['domicilio_fecha_fin'] =request('domicilio_fecha_fin' );
        $domicilio['domicilio_hora_entrega_real'] =request('domicilio_hora_entrega_real');
        $domicilio['domicilio_efectivo_entrega'] =request('domicilio_efectivo_entrega' );
        $domicilio['domicilio_efectivo_monto'] =request('domicilio_efectivo_monto' );
        $domicilio['domicilio_id_tipo_vehiculo'] =request('domicilio_id_tipo_vehiculo' );
        $domicilio['domicilio_id_tipo_servicio'] =request('domicilio_id_tipo_servicio' );
        $domicilio['domicilio_fecha_solicitud'] =request('domicilio_fecha_solicitud' );
        $domicilio['domicilio_hora_solicitud'] =request('domicilio_hora_solicitud' );
        $domicilio['domicilio_fecha_entrega_solicita'] =request('domicilio_fecha_entrega_solicita' );
        $domicilio['domicilio_hora_entrega_solicita'] =request('domicilio_hora_entrega_solicita' );
        //$domicilio['domicilio_id_cliente'] =request('domicilio_id_cliente' );
        $domicilio['domicilio_id_userid'] =request('domicilio_id_userid' );
        $domicilio['domicilio_notas'] =request('domicilio_notas' );

        $domicilio->save();
        $notification = 'La información del domicilio se ha actualizado correctamente.';
        return redirect('/domicilios')->with(compact('notification'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
