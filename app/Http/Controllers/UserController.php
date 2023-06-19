<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    //--METODO PARA TRAER TODOS LOS DATOS DE LA TABLA -//
    public function index(){

        $user = Cache::remember('user', 10, function () {
            return DB::table('users')->get();
        });;

        return response()->json(compact('user'));

    }

   //--METODO PARA CREAR UN NUEVO REGISTRO EN LA TABLA DE LA BASE DE DATOS-//
    public function store(Request $request){
        //-Enviamos los parametros para crear el usuario-//

        $user = new User();

        $user->name = $request->get('name');
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->type_document = $request->get('type_document');
        $user->document_number = $request->get('document_number');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->emergency_contact = $request->get('emergency_contact');
        $user->birthdate = $request->get('birthdate');
        $user->password = Hash::make($request->get('password'));
        
        // Condicional para verificar que en el input esté cargado un archivo
        if ($request->hasFile('image_profile')) {
            $file = $request->file('image_profile');
            $filename = 'IP-' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/users/', $filename);
            $user->image_profile = $filename;
        }
        
        $user->save();

        //-Generamos el mensaje para verificar que todo salio bien-//
        
            $data = [
                'message' => 'Usuario creado Correctamente',
                'user' => $user
            ];
        
        //-Se retorna la respuesta en Formato Json-//
        
            return response()->json([
                $data
            ]);

    }

   //--METODO PARA OBTENER UN REGISTRO EN ESPECIFICO DE LA TABLA-//
    public function show(User $user){
        return response()->json(compact('user'));
    }

    //--METODO PARA OBTENER UN REGISTRO EN ESPECIFICO DE LA TABLA-//
    public function update(User $user, Request $request){


       $user->name = $request->name;
       $user->firstname = $request->firstname;
       $user->lastname = $request->lastname;
       $user->type_document = $request->type_document;
       $user->document_number = $request->document_number;
       $user->email = $request->email;
       $user->phone_number = $request->phone_number;
       $user->emergency_contact = $request->emergency_contact;
       $user->birthdate = $request->birthdate;

       $user->save();

        $data = [

            'message' => 'Datos de usuario editados Correctamente',
            'user' =>$user
        ];

        return response()->json($data);

    }

    //--METODO PARA OBTENER LOS RESULTADOS DE LAS BUSQUEDAS//
    public function searchUser(Request $request) {
        $name = $request->input('name');
        $id = $request->input('id');
    
        $query = DB::table('users')
        ->where('name', 'like', '%'.$name.'%');
    
        if ($id !== '') {
            $idArray = explode(',', $id);
            $query = $query->whereIn('id', $idArray);
        }
        
        $users = $query->get();
        
        return response()->json([
            'users' => $users
        ]);
    }
    
    
}


