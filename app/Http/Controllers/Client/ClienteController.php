<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Models\TiposUsuario;
use App\Models\User;
use App\Models\UsuarioEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth');
    }

    private function performValidation($request){

        $rules = [
            'cliente_nombre'=> 'min:3',
            'cliente_email'=> 'required|email',
            'cliente_direccion'=> 'min:5',
            'cliente_numero_documento'=> 'between:6,15',
            'cliente_telefono_contacto'=> 'min:8'
        ];
        $messages = [
            'cliente_nombre,required'=> 'Por favor escriba un nombre para el cliente',
            'cliente_nombre.min' => 'El nombre debe tener mínimo 4 carácteres',
            'cliente_email.required' => 'Por favor escriba una dirección de correo',
            'cliente_email.email'=> 'Por favor escriba una dirección de correo válida',
            'cliente_direccion'=> 'La dirección debe contar con al menos 5 carácteres',
            'cliente_numero_documento'=> 'El DNI debe tener entre 6 y 10 dígitos',
            'cliente_telefono_contacto'=> 'El teléfono debe tener al menos 8 dígitos'

        ];
        $this->validate($request,$rules,$messages);

    }

    public function index(){

        $clientes = Cliente::orderBy('clientes.cliente_id','asc')->get()->all();
        //dd($clientes);
        return view('clients.index', compact('clientes'));

    }

    public function store(Request $request){

        //$this->performValidation($request);

        $valida = DB::table('clientes')->where('cliente_numero_documento',$request->cliente_numero_documento)->exists();

        if ($valida){

            $notification = 'Ya existe un cliente con el documento que intenta registrar.';

            return redirect('/clients/create')->with(compact('notification',$request));
        }else{
            DB::transaction(function () use ($request){
                //$request['id_tipo_documento']= (int)$request['id_tipo_documento'];
                //$request['id_estado']= (int)$request['id_estado'];
                //dd($request);
                $cliente = Cliente::create($request->all());
                //$user = User::create($request->only('numero_documento','id_tipos_usuario','id_usuestado','nota')+['id_personas'=> $persona->id]+['password' => bcrypt($request->input('password'))]);
            });
            $notification = 'El cliente se ha registrado correctamente.';
            return redirect('/clients')->with(compact('notification'));
        }
//dd($request);
    }

    public function create(){
        $tiposdocumentos = TipoDocumento::all();
        $usuarioestados = UsuarioEstado::all();

        return view('clients.create',compact('usuarioestados','tiposdocumentos'));

    }
    public function show($id){

    }
    public function edit($id){

        //$usuario = User::personas()->findOrFail($id);
        $cliente = Cliente::all()->find($id);
        //dd($cliente);
        $tiposdocumentos = TipoDocumento::all();
        $usuarioestados = UsuarioEstado::all();

        return view('clients.edit')->with(compact('cliente','tiposdocumentos','usuarioestados'));

    }

    public function update(Request $request, $id){


        $cliente = Cliente::find($id);

        $cliente['cliente_nombre']= request('cliente_nombre');
        $cliente['cliente_nombre_comercial']=request('cliente_nombre_comercial');
        $cliente['cliente_id_tipo_documento']=request('cliente_id_tipo_documento');
        $cliente['cliente_numero_documento'] = request('cliente_numero_documento');
        $cliente['cliente_telefono']= request('cliente_telefono');
        $cliente['cliente_inicio_contrato']=request('cliente_inicio_contrato');
        $cliente['cliente_email']=request('cliente_email');
        $cliente['cliente_direccion']=request('cliente_direccion');
        $cliente['cliente_ciudad']=request('cliente_ciudad');
        $cliente['cliente_contacto']=request('cliente_contacto');
        $cliente['cliente_telefono_contacto']=request('cliente_telefono_contacto');
        $cliente['cliente_horario_inicio']=request('cliente_horario_inicio');
        $cliente['cliente_horario_fin']=request('cliente_horario_fin');
        $cliente['cliente_pagina_web']=request('cliente_pagina_web');
        $cliente['cliente_notas']=request('cliente_notas');
        $cliente['cliente_id_estado']=request('cliente_id_estado');
        //dd($cliente);
        $cliente->save();



        $notification = 'La información del cliente se ha actualizado correctamente.';
        return redirect('/clients')->with(compact('notification'));

    }
}
