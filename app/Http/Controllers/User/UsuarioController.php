<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\TiposUsuario;
use App\Models\User;
use App\Models\UsuarioEstado;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function _construct()
{
    $this->middleware('auth');
}

    private function performValidation($request){
        $rules = [
            'persona_nombres'=> 'min:3',
            'persona_email'=> 'required|email',
            'persona_direccion'=> 'min:5',
            'numero_documento'=> 'between:6,15',
            'persona_cel_corporativo'=> 'min:8'
        ];
        $messages = [
            'persona_nombres,required'=> 'Por favor escriba un nombre para el usuario',
            'persona_nombres.min' => 'El nombre debe tener mínimo 4 carácteres',
            'persona_email.required' => 'Por favor escriba una dirección de correo',
            'persona_email.email'=> 'Por favor escriba una dirección de correo válida',
            'persona_direccion'=> 'La dirección debe contar con al menos 5 carácteres',
            'numero_documento'=> 'El DNI debe tener entre 6 y 10 dígitos',
            'persona_cel_corporativo'=> 'El teléfono debe tener al menos 8 dígitos'

        ];
        $this->validate($request,$rules,$messages);
    }


    public function index(){

    $usuarios = User::orderBy('personas.persona_nombres','asc')->join('personas', 'personas.persona_id','=', 'users.id_personas')
        ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
        ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
        ->get()->all();
    //dd($usuarios);
    return view('users.index', compact('usuarios'));

}

    public function store(Request $request){

    $this->performValidation($request);

    $valida = DB::table('users')->where('numero_documento',$request->numero_documento)->exists();

    if ($valida){

        $notification = 'Ya existe un usuario con el documento que intenta registrar.';

        return redirect('/users/create')->with(compact('notification',$request));
    }else{
        DB::transaction(function () use ($request){
            $persona = Persona::create($request->all());
            $user = User::create($request->only('numero_documento','id_tipos_usuario','id_usuestado')+['id_personas'=> $persona->id]+['password' => bcrypt($request->input('password'))]);
        });
        $notification = 'El usuario se ha registrado correctamente.';
        return redirect('/users')->with(compact('notification'));
    }
//dd($request);
}

    public function create(){
    $tiposdocumentos = TipoDocumento::all();
    $usuarioestados = UsuarioEstado::all();
    $tiposusuarios = TiposUsuario::all();
    $clientes = Cliente::orderBy('cliente_nombre_comercial','asc')->get()->all();
    return view('users.create',compact('tiposusuarios','usuarioestados','tiposdocumentos','clientes'));

}
    public function show($id){

}
    public function edit($id){

    //$usuario = User::personas()->findOrFail($id);
    $usuario = User::join('personas', 'personas.persona_id','=', 'users.id_personas')
        ->join('tipos_usuario', 'tipos_usuario.tipousu_id','users.id_tipos_usuario')
        ->join('usuario_estados', 'usuario_estados.usuestado_id','=','users.id_usuestado')
        ->get()->find($id);
    //$usuario = User::join('personas','personas.id','=', 'users.id_personas')->where('users.userid','=', $id)->get()->all();
    //dd($usuario);
    //$usuario = User::all()->where('users.userid','=', $id);
    $tiposdocumentos = TipoDocumento::all();
    $usuarioestados = UsuarioEstado::all();
    $tiposusuarios = TiposUsuario::all();
    $clientes = Cliente::all();
    //return view('doctors.edit')->with(compact('doctor', 'specialties','specialty_ids'));
    //dd($specialty_ids->all());
    return view('users.edit')->with(compact('usuario','tiposusuarios','usuarioestados','tiposdocumentos','clientes'));

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
    $persona['persona_id_tipo_documento']=request('persona_id_tipo_documento');
    $persona['persona_nombres'] = request('persona_nombres');
    $persona['persona_apellidos']= request('persona_apellidos');
    $persona['persona_email']=request('persona_email');
    $persona['persona_cel_personal']=request('persona_cel_personal');
    $persona['persona_cel_corporativo']=request('persona_cel_corporativo');
    $persona['persona_direccion']=request('persona_direccion');
    $persona['persona_sexo']=request('persona_sexo');
    $persona['persona_fecha_nacimiento']=request('persona_fecha_nacimiento');
    $persona['persona_ciudad']=request('persona_ciudad');
    $persona['persona_id_cliente']=request('persona_id_cliente');
    $persona['persona_nota']=request('persona_nota');
    //dd($user,$persona);
    $user->save();
    $persona->save();


    $notification = 'La información del usuario se ha actualizado correctamente.';
    return redirect('/users/'.$user->userid.'/edit')->with(compact('notification'));

}
}
