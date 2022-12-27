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

    public function selcliente($id){
        return CliArea::where('area_id_cliente', $id)
            ->where('area_estado',1)
            ->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        //$areas = CliArea::all();
        $areas = CliArea::orderBy('cliente_nombre','asc')->join('cli_sedes','cli_sedes.sede_id','=', 'cli_areas.area_id_sede')
            ->join('clientes','clientes.cliente_id','cli_areas.area_id_cliente')
            ->get()->all();

        return view('areas.index', compact('areas',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $clientes = Cliente::all();
        //$sedes = CliSede::where('sede_id_cliente' .'=','area_id_sede');
        return view('areas.create', compact('clientes',));
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
        $valida = DB::table('cli_areas')->where('area_nombre',$request->nombre)->exists();

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
        //$sedes = CliSede::has('areas')->get();
        //$sedes = CliSede::where('id_cliente'.'=',);
        $sedes = CliSede::all();
        $usuarioestados = UsuarioEstado::all();
        return view('areas.edit',compact('clientes','sedes','usuarioestados','area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //
        $area = CliArea::find($id);

        $area['area_nombre']= request('area_nombre');
        $area['area_nombre_contacto']=request('area_nombre_contacto');
        $area['area_telefono_contacto']=request('area_telefono_contacto');
        $area['area_id_cliente']=request('area_id_cliente');
        $area['area_id_sede']=request('area_id_sede');
        $area['area_estado']=request('area_estado');
        //dd($sede);
        $area->save();

        $notification = 'La información del área se ha actualizado correctamente.';
        return redirect('/areas')->with(compact('notification'));
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
