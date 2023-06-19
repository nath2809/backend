<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Permission;


use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    
    public function addPermissionToRole(Request $request, $role_id){


        // Obtener el usuario al que se le van a agregar los roles
        $role = Role::find($role_id);

        // Obtener los IDs de los roles que se van a agregar
        $permission_ids = (array) $request->input('permission_ids');

        // Verificar si se recibió un solo ID de rol como valor
        if(!is_array($permission_ids)) {
            $permission_ids = [$permission_ids];
        }

        // Obtener los roles correspondientes a los IDs
        $permission = Permission::whereIn('id', $permission_ids)->get();
  
        // Agregar los roles al usuario (si no existen)
        $role->permissions()->syncWithoutDetaching($permission->pluck('id')->toArray());

        return response()->json(['message' => 'Permisos agregados correctamente']);
    }

    }

