<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CliArea;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __invoke()
    {

    }
    public function index(){

        //return Cliente::all(['cliente_id','cliente_nombre_comercial','cliente_id_estado'])->sortBy('cliente_nombre_comercial');
        return Cliente::orderBy('cliente_nombre_comercial','asc')->get();
    }

    public function areasCliente(Request $request){

        $cliente_id = $request->only('cliente_id');

        return CliArea::orderBy('cli_areas.area_nombre','asc')->where('cli_areas.area_id_cliente','=',$cliente_id)->get();
    }
}
