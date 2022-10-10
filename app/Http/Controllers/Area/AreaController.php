<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Models\CliArea;
use App\Models\Cliente;
use App\Models\CliSede;
use App\Models\UsuarioEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        //$areas = CliArea::all();
        $areas = CliArea::with('cli_sedes:id,nombre');
        $sedes = CliArea::orderBy('cli_areas.nombre','asc')->join('cli_sedes','cli_sedes.id','id_sede')->get()->all();
        $clientes = CliArea::orderBy('cli_areas.nombre','asc')->join('clientes','clientes.id','id_cliente')->get()->all();
        //$sedes = DB::table('cli_sedes')->select('id','nombre')->get()->toArray();

        //$sedes = CliSede::orderBy('cli_sedes.nombre','asc')->get()->all();
        //$clientes = Cliente::orderBy('clientes.nombre_comercial','asc')->get()->all();
        //$clientes = DB::table('clientes')->select('id','nombre_comercial')->get()->toArray();
        //dd($areas);
        return view('areas.index', compact('areas','sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
        $sedes = CliSede::where('id_cliente'.'=',0);
        return view('areas.create', compact('sedes','clientes'));
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
        $valida = DB::table('cli_areas')->where('nombre',$request->nombre)->exists();

        if ($valida){

            $notification = 'Ya existe un área con el nombre que intenta registrar.';

            return redirect('/areas/create')->with(compact('notification',$request));
        }else{
            DB::transaction(function () use ($request){
                //dd($request);
                $sede = CliArea::create($request->all());
                //$user = User::create($request->only('numero_documento','id_tipos_usuario','id_usuestado','nota')+['id_personas'=> $persona->id]+['password' => bcrypt($request->input('password'))]);
            });
            $notification = 'El área se ha registrado correctamente.';
            return redirect('/areas')->with(compact('notification'));
        }

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id){
        $area = CliArea::all()->find($id);
        $clientes = Cliente::all();
        //$sedes = CliSede::where('id_cliente'.'=',0);
        $sedes = CliSede::all();
        $usuarioestados = UsuarioEstado::all();
        return view('areas.edit',compact('clientes','sedes','usuarioestados','area'));
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
