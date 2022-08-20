<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $usuarios = User::all(with('personas.*'));
        return view('users.index', compact('usuarios'));

    }

    public function store(){

    }

    public function create(){

    }
    public function show($id){

    }
    public function edit($id){

    }

    public function update(){

    }
}
