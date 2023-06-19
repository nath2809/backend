<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ProgramController extends Controller
{
    
    //--METODO PARA TRAER TODOS LOS DATOS DE LA TABLA -//
    public function index(){

        $program = Cache::remember('program', 10, function () {
            return DB::table('programs')->get();
        });
        return response()->json(compact('program'));

    }

    //--METODO PARA CREAR UN NUEVO REGISTRO EN LA TABLA DE LA BASE DE DATOS-//
    public function store(Request $request){

        $program =new Program();

        $program->name = $request->name;
        $program->description = $request->description;
        $program->grade_to_get= $request->grade_to_get;
        $program->skills_to_develop= $request->skills_to_develop;

        // Condicional para verificar que en el input esté cargado un archivo
        if ($request->hasFile('image_program')) {
            $file = $request->file('image_program');
            $filename = 'PRO-' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/programs/', $filename);
            $program->image_program = $filename;
        }
        
        $program->save();

    //-Generamos el mensaje para verificar que todo salio bien-//

    $data = [
        'message' => 'Ficha creada Correctamente',
        'user' => $program
    ];

    //-Se retorna la respuesta en Formato Json-//

    return response()->json($data);
        
    }

    //--METODO PARA OBTENER UN REGISTRO EN ESPECIFICO DE LA TABLA-//
    public function show(Program $program){
        
        return response()->json(compact('program'));

    }

    //--METODO PARA OBTENER UN REGISTRO EN ESPECIFICO DE LA TABLA-//
    public function update(Program $program, Request $request){
        
        $program->name = $request->name;
        $program->description = $request->description;
        $program->grade_to_get= $request->grade_to_get;
        $program->skills_to_develop= $request->skills_to_develop;
        $program->save();

        $data = [
            'message' => 'Programa Editado Correctamente',
            'user' => $program
        ];


        return response()->json($data);


    }

    //--METODO PARA OBTENER LOS RESULTADOS DE LAS BUSQUEDAS//
    public function searchProgram(Request $request){

        $searchTerm = $request->input('searchTerm');
        $programs = DB::table('programs')
            ->where('name','like','%'.$searchTerm.'%')
            ->get();

        return response()->json($programs);

    }
}
