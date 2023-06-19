<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Wramirez83\Sjwt\SJWT;

class AuthController extends Controller
{


    // METODO PARA VERIFICAR  LAS CREDENCIALES DE LOS USUARIOS\\
    public function login(LoginRequest $request)
    {
    
      $user = User::whereEmail($request->email)->first();
      if($user)
      {
        if(!password_verify($request->password, $user->password))
            return response()->json(['errors' => 'Credenciales Incorrectas']);
            
            $user = collect($user);
            return $token =  SJWT::encode($user->except(['password'])->toArray());
      }
 
    }
    
    // METODO PARA DESTRUIR LA SESION DEL USUARIO\\
    public function logout(Request $request)
    {
        // SJWT::decode($request->bearerToken());
        // return response()->json(['message' => 'Successfully logged out']);
    }

}
