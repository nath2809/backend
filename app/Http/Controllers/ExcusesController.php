<?php

namespace App\Http\Controllers;

use App\Models\Excuse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ExcusesController extends Controller
{

    // -------------------------------------- \\

    public function index(Request $request){

        $excuses = Cache::remember('excuse', 10, function () {
            return DB::table('excuses')->get();
        });;

        return response()->json(compact('excuses'));
    }

    // -------------------------------------- \\
    
    public function store(Request $request){

        $studentExcuse = new Excuse();

        $studentExcuse->student_id = $request->get('student_id');

        // Condicional para verificar que en el input esté cargado un archivo
        if ($request->hasFile('excuse')) {
            $file = $request->file('excuse');
            $filename = 'EX-' . time() . rand() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/files/excuses/', $filename);
            $studentExcuse->excuse = $filename;
        }
        
        $studentExcuse->save();

        //-Generamos el mensaje para verificar que todo salio bien-//

        $data = [
            'Message' => 'Excusa subida correctamente',
            'Datos' => $studentExcuse
        ];

        //-Se retorna la respuesta en Formato Json-//

        return response()->json([
            $data
        ]);

    }

    // -------------------------------------- \\
    
    public function show(Excuse $excuse){
        return response()->json(compact('excuse'));
    }
}
