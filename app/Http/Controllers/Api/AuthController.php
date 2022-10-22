<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
       // return $request->only('numero_documento', 'password');



       /* $request->validate([
            'numero_documento' => 'required|numeric',
            'password' => 'required|string',
       ]);  */

        $credentials = $request->only('numero_documento', 'password');


/*
        if (Auth::guard('api')->attempt($credentials)){

            return "Logueado";
        } else {

        }
*/

        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json([
                'success' => 'false',
                'message' => 'Credenciales inválidas',
            ], 401);
        }

        //$user = Auth::user();
        $user = Auth::guard('api')->user();

        return response()->json([
            'success' => 'true',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);

    }

    public function register(Request $request){
        $request->validate([
            'numero_documento' => 'required|max:255',
            'password' => 'required|string|min:1',
        ]);

        $user = User::create([
            'numero_documento' => $request->numero_documento,
            'password' => Hash::make($request->password),
        ]);
/*
        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]); */
    }

    public function logout()
    {
        /*
        Auth::guard('api')->logout();
        $success = true;
        return compact('success');
        */

        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function user()
    {
        return 'PRIVADO';
    }
}
