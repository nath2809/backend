<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');
    
        // Verifica si el correo electrónico proporcionado por el usuario está registrado en la base de datos
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return response()->json(['error' => 'El email ingresado no se encuentra registrado'], 400);
        }
    
        // Genera el token
        $token = Str::random(60);
    
        // Crea un registro en la tabla "password_resets" con el token y el correo electrónico del usuario
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()
        ]);
    
        // Construye la URL de restablecimiento
        // Envía el correo electrónico
        $resetUrl = 'http://localhost:3000/reset_password?token=' . $token;
        $correo = new ResetPasswordMail($token, $user, $resetUrl);
        Mail::to($email)->send($correo);

        return response()->json(['message' => 'Correo electrónico de restablecimiento de contraseña enviado', 'resetUrl' => $resetUrl]);

    }
}
