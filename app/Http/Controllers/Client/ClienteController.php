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
            'nombre'=> 'min:3',
            'email'=> 'required|email',
            'direccion'=> 'min:5',
            'numero_documento'=> 'between:6,15',
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

        $clientes = Cliente::orderBy('clientes.cliente_id','asc')->get()->all();
        //dd($clientes);
        return view('clients.index', compact('clientes'));

    }

    public function store(Request $request){

        $this->performValidation($request);

        $valida = DB::table('clientes')->where('cliente_numero_documento',$request->numero_documento)->exists();

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

        $cliente['nombre']= request('nombre');
        $cliente['nombre_comercial']=request('nombre_comercial');
        $cliente['id_tipo_documento']=request('id_tipo_documento');
        $cliente['numero_documento'] = request('numero_documento');
        $cliente['telefono']= request('telefono');
        $cliente['inicio_contrato']=request('inicio_contrato');
        $cliente['email']=request('email');
        $cliente['direccion']=request('direccion');
        $cliente['ciudad']=request('ciudad');
        $cliente['contacto']=request('contacto');
        $cliente['telefono_contacto']=request('telefono_contacto');
        $cliente['horario_inicio']=request('horario_inicio');
        $cliente['horario_fin']=request('horario_fin');
        $cliente['pagina_web']=request('pagina_web');
        $cliente['notas']=request('notas');
        $cliente['id_estado']=request('id_estado');
        //dd($cliente);
        $cliente->save();



        $notification = 'La información del cliente se ha actualizado correctamente.';
        return redirect('/clients')->with(compact('notification'));

    }
}
