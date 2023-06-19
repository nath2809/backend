<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class FichaController extends Controller
{
    //--METODO PARA TRAER TODOS LOS DATOS DE LA TABLA -//
    public function index(){

        $group = Cache::remember('group', 10, function () {
            return DB::table('groups')->get();
        });
        return response()->json(compact('group'));


    }
    
    //--METODO PARA CREAR UN NUEVO REGISTRO EN LA TABLA DE LA BASE DE DATOS-//
    public function store(Request $request){
        //-Enviamos los parametros para crear la ficha-//

            $group = new Group();
            $group->type = $request->type;
            $group->program_id = $request->program_id;
            $group->status = $request->status;
            $group->start_date = $request->start_date;
            $group->ending_date = $request->ending_date;
            $group->tab_leader_id = $request->tab_leader_id;

            // Condicional para verificar que en el input esté cargado un archivo
            if ($request->hasFile('image_group')) {
                $file = $request->file('image_group');
                $filename = 'GR-' . time() . rand() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images/groups/', $filename);
                $group->image_group = $filename;
            }
            
            $group->save();
        
        
        
        //-Generamos el mensaje para verificar que todo salio bien-//
        
            $data = [
                'message' => 'Ficha creada Correctamente',
                'user' => $group
            ];
        
        //-Se retorna la respuesta en Formato Json-//
        
            return response()->json($data);
                

    }

    //--METODO PARA OBTENER UN REGISTRO EN ESPECIFICO DE LA TABLA-//
    public function show(Group $group){

        return response()->json(compact('group'));
    
    }

    //--METODO PARA OBTENER UN REGISTRO EN ESPECIFICO DE LA TABLA-//
    public function update(Group $group, Request $request){

        $group->type = $request->type;
        $group->program_id = $request->program_id;
        $group->status = $request->status;
        $group->start_date = $request->start_date;
        $group->ending_date = $request->ending_date;
        $group->tab_leader_id = $request->tab_leader_id;

        $group->save();

        $data = [

            'message' => 'Datos de la ficha editados Correctamente',
            'ficha' => $group
        ];

        return response()->json($data);

    }

    //--METODO PARA OBTENER LOS RESULTADOS DE LAS BUSQUEDAS//
    public function searchGroup(Request $request){

        $searchTerm = $request->input('searchTerm');

        $groups = DB::table('groups')
            ->where('id', $searchTerm)
            ->get();

            return response()->json($groups);
    }

    //--METODO PARA OBTENER LOS RESULTADOS SEGUN EL FILTRO DE LAS FICHAS//
    public function filterGroup(Request $request){
        $type = $request->input('type');
        $status = $request->input('status'); 
    
        // Consulta para filtrar los grupos por tipo y status
        $filteredGroups = Group::query();
    
        if (!empty($type)) {
            $filteredGroups->where('type', $type);
        }
    
        if (!empty($status)) {
            $filteredGroups->where('status', $status);
        }
    
        $filteredGroups = $filteredGroups->get();
    
        return response()->json(['groups' => $filteredGroups]);
    }


}
