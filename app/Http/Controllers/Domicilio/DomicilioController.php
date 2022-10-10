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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domicilios = Domicilio::orderBy('domicilios.id','asc')->get()->all();
        return $domicilios;
        //dd($domicilios);
        //return view('domicilios.index', compact('domicilios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::orderBy('personas.nombres','asc')->join('personas','personas.id','=', 'users.id_personas')
            ->join('tipos_usuario','tipos_usuario.id','users.id_tipos_usuario')
            ->join('usuario_estados','usuario_estados.id','=','users.id_usuestado')
            ->get()->all();
        $clientes = Cliente::all();
        $sedes = CliSede::all();
        $areas = CliArea::all();
        //dd($origen_destinos);
        $tipovehiculos = Vehiculo::all();
        $tiposervicios = TipoServicio::all();

        return view('domicilios.create')->with(compact('usuarios', 'tipovehiculos', 'clientes', 'sedes', 'areas','tiposervicios'));
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
        return redirect('/clients')->with(compact('notification'));
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
