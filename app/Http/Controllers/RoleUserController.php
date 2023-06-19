<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RoleUserController extends Controller
{



    public function roleUser(Request $request){

        $role_id = $request->input('role_id');
    
        $query = DB::table('role_user');
    
        if($role_id){
            $query->where('role_id', $role_id);
        }
    
        $roleUser = $query->get();
    
        return response()->json([
            'role_user' => $roleUser
        ]);
    }
    
    public function addRoleToUser(Request $request, $user_id){

        // Obtener el usuario al que se le van a agregar los roles
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'El usuario no existe'], 404);
        }

        // Obtener los IDs de los roles que se van a agregar
        $role_ids = (array) $request->input('role_ids');

        // Verificar si se recibió un solo ID de rol como valor
        if(!is_array($role_ids)) {
            $role_ids = [$role_ids];
        }

        // Obtener los roles correspondientes a los IDs
        $roles = Role::whereIn('id', $role_ids)->get();
  
        // Agregar los roles al usuario (si no existen)
        $user->roles()->syncWithoutDetaching($roles->pluck('id')->toArray());
        
        return response()->json(['message' => 'Roles agregados correctamente']);
    }



}

