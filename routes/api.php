<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\ExcusesController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

    //Rutas para la Autenticacion
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Rutas para el CRUD de los Usuarios
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{user}', [UserController::class, 'update']);

    //Rutas para el CRUD de las fichas
    Route::get('groups', [FichaController::class, 'index']);
    Route::get('groups/{group}', [FichaController::class, 'show']);
    Route::post('groups', [FichaController::class, 'store']);
    Route::put('groups/{group}', [FichaController::class, 'update']);

    //Rutas para el CRUD de los programas
    Route::get('programs', [ProgramController::class, 'index']);
    Route::get('programs/{program}', [ProgramController::class, 'show']);
    Route::post('programs', [ProgramController::class, 'store']);
    Route::put('programs/{program}', [ProgramController::class, 'update']);

    //Rutas para el CRUD de las excusas
    Route::get('excuses', [ExcusesController::class,'index']);
    Route::post('excuses', [ExcusesController::class,'store']);
    Route::get('excuses/{excuse}', [ExcusesController::class,'show']);

    //Rutas de los buscadores
    Route::get('user/search', [UserController::class, 'searchUser']);
    Route::get('group/search', [FichaController::class, 'searchGroup']);
    Route::get('program/search', [ProgramController::class, 'searchProgram']);

    //Rutas para los filtros
    Route::get('group/filter', [FichaController::class, 'filterGroup']);

    //Agregar Usuarios a las fichas
    Route::post('groups/{group}/students', [GroupUserController::class, 'addStudentToGroup']);
    Route::post('groups/{group}/instructors', [GroupUserController::class, 'addInstructorToGroup']);

    //Agregar Roles a los usuarios
    Route::post('user/{user_id}/roles', [RoleUserController::class,'addRoleToUser']);

    //Agregar Permisos a los roles
    Route::post('role/{role_id}/permissions', [PermissionRoleController::class,'addPermissionToRole']);

    //Obtener los registros de las tablas "PIVOTES"
    Route::get('role_user', [RoleUserController::class,'roleUser']);
    Route::get('student_groups', [GroupUserController::class,'studentGroup']);
    Route::get('all_students_groups', [GroupUserController::class,'AllstudentsGroups']); //Obtener todos los registros de la tabla student_groups
    Route::get('instructor_groups', [GroupUserController::class,'instructorGroup']);

    //AGREGAR APRENDICES Y INSTRUCTORES A LAS FICHAS
    Route::post('student_groups/{group_id}', [GroupUserController::class,'addStudentToGroup']);
    Route::post('instructor_groups/{group_id}', [GroupUserController::class,'addInstructorToGroup']);

    //ELIMINAR APRENDICES Y INSTRUCTORES DE LAS FICHAS
    Route::delete('student_groups/{group_id}', [GroupUserController::class, 'removeStudentFromGroup']);
    Route::delete('instructor_groups/{group_id}', [GroupUserController::class, 'removeInstructorFromGroup']);

    //RUTAS PARA EL RESETEO DE CONTRASENA
    Route::post('/password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail']);

    //RUTAS PARA ACTUALIZAR LA CONTRASENA
    Route::post('/password/update', [ResetPasswordController::class, 'resetPassword']);














