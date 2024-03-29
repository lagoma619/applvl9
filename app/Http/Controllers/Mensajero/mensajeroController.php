<?php

namespace App\Http\Controllers\Mensajero;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class mensajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($estado)
    {
        //dd($request);
        switch ($estado){
            case ('3'):
                $mensajeros = User::where('id_tipos_usuario', '=', 1)
                    ->where('id_usuestado', '=', 3)
                    ->orderBy('personas.persona_nombres', 'asc')->join('personas', 'personas.persona_id', '=', 'users.id_persona')
                    ->join('tipos_usuario', 'tipos_usuario.tipousu_id', 'users.id_tipos_usuario')
                    ->join('usuario_estados', 'usuario_estados.usuestado_id', '=', 'users.id_usuestado')
                    ->get()->all();
                return view('mensajeros.index', compact('mensajeros'));
            case ('4'):
                $mensajeros = User::where('id_tipos_usuario', '=', 1)
                    ->where('id_usuestado', '=', 4)
                    ->orderBy('personas.persona_nombres', 'asc')->join('personas', 'personas.persona_id', '=', 'users.id_persona')
                    ->join('tipos_usuario', 'tipos_usuario.tipousu_id', 'users.id_tipos_usuario')
                    ->join('usuario_estados', 'usuario_estados.usuestado_id', '=', 'users.id_usuestado')
                    ->get()->all();
                return view('mensajeros.index', compact('mensajeros'));

            case ('2'):
                $mensajeros = User::where('id_tipos_usuario', '=', 1)
                    ->where('id_usuestado', '=', 2)
                    ->orderBy('personas.persona_nombres', 'asc')->join('personas', 'personas.persona_id', '=', 'users.id_persona')
                    ->join('tipos_usuario', 'tipos_usuario.tipousu_id', 'users.id_tipos_usuario')
                    ->join('usuario_estados', 'usuario_estados.usuestado_id', '=', 'users.id_usuestado')
                    ->get()->all();
                return view('mensajeros.index', compact('mensajeros'));
        }
        /*
            if ($estadomensajero = 3) {
                $mensajeros = User::where('id_tipos_usuario', '=', 1)
                    ->where('usuestado_id', '=', 3)
                    ->orderBy('personas.persona_nombres', 'asc')->join('personas', 'personas.persona_id', '=', 'users.id_persona')
                    ->join('tipos_usuario', 'tipos_usuario.tipousu_id', 'users.id_tipos_usuario')
                    ->join('usuario_estados', 'usuario_estados.usuestado_id', '=', 'users.id_usuestado')
                    ->get()->all();
                //dd($mensajeros);
            } elseif ($estadomensajero = 4) {
                $mensajeros = User::where('id_tipos_usuario', '=', 1)
                    ->where('usuestado_id', '=', 4)
                    ->orderBy('personas.persona_nombres', 'asc')->join('personas', 'personas.persona_id', '=', 'users.id_persona')
                    ->join('tipos_usuario', 'tipos_usuario.tipousu_id', 'users.id_tipos_usuario')
                    ->join('usuario_estados', 'usuario_estados.usuestado_id', '=', 'users.id_usuestado')
                    ->get()->all();
                //dd($mensajeros);
                //return view('mensajeros.index', compact('mensajeros'));
            }
            */
        //dd($mensajeros);
        return view('mensajeros.index', compact('mensajeros'));

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
