<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Models\UsuarioEstado;


class ClienteController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth');
    }

    private function performValidation($request){

        $rules = [
            'nombres'=> 'required|min:3',
            'email'=> 'required|email',
            'direccion'=> 'nullable|min:5',
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

        $clientes = Cliente::orderBy('clientes.id','asc')->get()->all();
        //dd($clientes);
        return view('clients.index', compact('clientes'));

    }

    public function store(Request $request){

        $this->performValidation($request);

        $valida = DB::table('clientes')->where('numero_documento',$request->numero_documento)->exists();

        if ($valida){

            $notification = 'Ya existe un cliente con el documento que intenta registrar.';

            return redirect('/clients/create')->with(compact('notification',$request));
        }else{
            DB::transaction(function () use ($request){
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
        $usuario = User::join('personas','personas.id','=', 'users.id_personas')
            ->join('tipos_usuario','tipos_usuario.id','users.id_tipos_usuario')
            ->join('usuario_estados','usuario_estados.id','=','users.id_usuestado')
            ->get()->find($id);
        //$usuario = User::join('personas','personas.id','=', 'users.id_personas')->where('users.userid','=', $id)->get()->all();
        //dd($usuario);
        //$usuario = User::all()->where('users.userid','=', $id);
        $tiposdocumentos = TipoDocumento::all();
        $usuarioestados = UsuarioEstado::all();
        $tiposusuarios = TiposUsuario::all();
        //return view('doctors.edit')->with(compact('doctor', 'specialties','specialty_ids'));
        //dd($specialty_ids->all());
        return view('users.edit')->with(compact('usuario','tiposusuarios','usuarioestados','tiposdocumentos'));

    }

    public function update(Request $request, $id){

        //$user = User::personas()->find($id);
        $user = User::find($id);
        $persona = Persona::find($user['id_personas']);

        $password = $request->input('password');
        if($password) $user['password'] = bcrypt($password);

        $user['numero_documento']= request('numero_documento');
        $user['id_tipos_usuario']=request('id_tipos_usuario');
        $user['id_usuestado']=request('id_usuestado');
        $persona['id_tipo_documento']=request('id_tipo_documento');
        $persona['nombres'] = request('nombres');
        $persona['apellidos']= request('apellidos');
        $persona['email']=request('email');
        $persona['cel_personal']=request('cel_personal');
        $persona['cel_corporativo']=request('cel_corporativo');
        $persona['direccion']=request('direccion');
        $persona['sexo']=request('sexo');
        $persona['fecha_nacimiento']=request('fecha_nacimiento');
        $persona['ciudad']=request('ciudad');
        $persona['notapersona']=request('notapersona');
        //dd($user,$persona);
        $user->save();
        $persona->save();


        $notification = 'La información del usuario se ha actualizado correctamente.';
        return redirect('/users')->with(compact('notification'));

    }
}
