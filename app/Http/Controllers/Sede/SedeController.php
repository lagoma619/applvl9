<?php

namespace App\Http\Controllers\Sede;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\CliSede;
use App\Models\UsuarioEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SedeController extends Controller
{
    //
    public function selsede($id){
        return CliSede::where('id_cliente', $id)->get();
    }

    public function _construct()
    {
        $this->middleware('auth');
    }

    private function performValidation($request){

        $rules = [
            'nombre'=> 'required|min:3',
            'direccion'=> 'min:5',
            'numero_documento'=> 'between:6,10',
            'phone'=> 'min:8'
        ];
        $messages = [
            'name,required'=> 'Por favor escriba un nombre para el médico',
            'name.min' => 'El nombre debe tener mínimo 4 carácteres',
            'email.required' => 'Por favor escriba una dirección de correo',
            'email.email'=> 'Por favor escriba una dirección de correo válida',
            'address'=> 'La dirección debe contar con al menos 5 carácteres',
            'dni'=> 'El DNI debe tener entre 6 y 10 dígitos',
            'phone'=> 'El teléfono debe tener al menos 8 dígitos'

        ];
        $this->validate($request,$rules,$messages);

    }

    public function index(){

        $sedes = CliSede::orderBy('cli_sedes.id','asc')->get()->all();
        //dd($clientes);
        return view('sedes.index', compact('sedes'));

    }

    public function store(Request $request){

        $this->performValidation($request);

        $valida = DB::table('cli_sedes')->where('nombre',$request->nombre)->exists();

        if ($valida){

            $notification = 'Ya existe una sede con el nombre que intenta registrar.';

            return redirect('/sedes/create')->with(compact('notification',$request));
        }else{
            DB::transaction(function () use ($request){
                //dd($request);
                $sede = CliSede::create($request->all());
                //$user = User::create($request->only('numero_documento','id_tipos_usuario','id_usuestado','nota')+['id_personas'=> $persona->id]+['password' => bcrypt($request->input('password'))]);
            });
            $notification = 'La sede se ha registrado correctamente.';
            return redirect('/sedes')->with(compact('notification'));
        }
//dd($request);
    }

    public function create(){
        $sedes = CliSede::all();
        $clientes = Cliente::all();
        return view('sedes.create',compact('sedes','clientes'));

    }
    public function show($id){
    }

    public function edit($id){
        //$usuario = User::personas()->findOrFail($id);
        $sede = CliSede::all()->find($id);
        $clientes = Cliente::all();
        $usuarioestados = UsuarioEstado::all();
        //dd($sede);

        return view('sedes.edit')->with(compact('sede','clientes','usuarioestados'));
    }

    public function update(Request $request, $id){

        $sede = CliSede::find($id);

        $sede['nombre']= request('nombre');
        $sede['direccion']=request('direccion');
        $sede['nombre_contacto']=request('nombre_contacto');
        $sede['telefono_contacto']=request('telefono_contacto');
        $sede['id_cliente']=request('id_cliente');
        $sede['notas']=request('notas');
        $sede['id_estado']=request('id_estado');
        //dd($sede);
        $sede->save();


        $notification = 'La información de la sede se ha actualizado correctamente.';
        return redirect('/sedes')->with(compact('notification'));

    }

}
