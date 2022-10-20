<?php

namespace App\Http\Controllers\Domicilio;

use App\Http\Controllers\Controller;
use App\Models\CliArea;
use App\Models\Cliente;
use App\Models\CliSede;
use App\Models\Domicilio;
use App\Models\TipoServicio;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->join('tipos_servicio', 'tipos_servicio.tiposervicio_id','domicilios.domicilio_id_tipo_servicio')
            ->join('tipos_vehiculo','tipos_vehiculo.tipovehiculo_id','domicilios.domicilio_id_tipo_vehiculo')->get()->all();
        //return $domicilios;
        //dd($domicilios);
        return view('domicilios.index', compact('domicilios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_personas')
            ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
            ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
            ->get()->all();
        $mensajeros = User::where('id_tipos_usuario','=',1)->orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_personas')
            ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
            ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
            ->get()->all();
        $clientes = Cliente::all();
        $sedes = CliSede::all();
        $areas = CliArea::all();
        //dd($mensajeros);
        $tipovehiculos = Vehiculo::all();
        $tiposervicios = TipoServicio::all();

        return view('domicilios.create')->with(compact('usuarios', 'tipovehiculos', 'clientes', 'sedes', 'areas','tiposervicios','mensajeros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::transaction(function () use ($request){
            $domicilio = Domicilio::create($request->all());
        });
        $notification = 'El domicilio se ha creado correctamente.';
        return redirect('/domicilios')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
