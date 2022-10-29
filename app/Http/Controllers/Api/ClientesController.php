<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function __invoke()
    {

    }


    public function index(){

        return Cliente::all(['cliente_id','cliente_nombre_comercial','cliente_id_estado'])->sortBy('cliente_nombre_comercial');
    }
}
