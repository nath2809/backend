<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\StudentGroup;
use App\Models\InstructorGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GroupUserController extends Controller
{
    
    // FUNCION PARA AGREGAR APRENDICES A UNA FICHA
    public function addStudentToGroup(Request $request, $group_id){

        $students = is_array($request->input('student_id')) ? $request->input('student_id') : [$request->input('student_id')];
        $group = Group::findOrFail($group_id);
    
        foreach ($students as $student_id) {
            $studentGroup = new StudentGroup();
            $studentGroup->group_id = $group->id;
            $studentGroup->student_id = $student_id;
            $studentGroup->save();
        }
    
        return response()->json(['message' => 'Aprendices agregados Correctamente']);
    }

    // FUNCION PARA PINTAR LOS DATOS DE LOS APRENDICES ASOCIADOS A UNA FICHA
    public function studentGroup(Request $request){
        $groupId = $request->input('group_id');
    
        $studentGroup = DB::table('student_groups')
            ->where('group_id', '=', $groupId)
            ->get();
    
        return response()->json([
            'student_groups' => $studentGroup
        ]);
    }

    // FUNCION PARA PINTAR LOS DATOS DE TODOS APRENDICES ASOCIADOS A UNA FICHA
    public function AllstudentsGroups(Request $request){
    
        $studentGroup = DB::table('student_groups')
            ->get();
    
        return response()->json([
            'student_groups' => $studentGroup
        ]);
    }

    // FUNCION PARA ELIMINAR LOS DATOS DE LOS APRENDICES ASOCIADOS A UNA FICHA
    public function removeStudentFromGroup(Request $request, $group_id) {

        $student_id = $request->input('student_id');
    
        DB::table('student_groups')
            ->where('student_id', $student_id)
            ->where('group_id', $group_id)
            ->delete();
    
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }
    
    // FUNCION PARA AGREGAR INSTRUCTORES A UNA FICHA
    public function addInstructorToGroup(Request $request, $group_id){
        $instructors = is_array($request->input('instructor_id')) ? $request->input('instructor_id') : [$request->input('instructor_id')];
        $group = Group::findOrFail($group_id);
    
        foreach ($instructors as $instructor_id) {
            $instructorGroup = new InstructorGroup();
            $instructorGroup->group_id = $group->id;
            $instructorGroup->instructor_id = $instructor_id;
            $instructorGroup->save();
        }
    
        return response()->json(['message' => 'Instructores agregados Correctamente']);
    }

    // FUNCION PARA OBTENER LOS REGISTROS DE LA TABLA PIVOTE ENTRE INSTRUCTORES Y GRUPOS
    public function instructorGroup(Request $request){

        $groupId = $request->input('group_id');
    
        $instructorGroup = DB::table('instructor_groups')
            ->where('group_id', '=', $groupId)
            ->get();
    
        return response()->json([
            'instructor_groups' => $instructorGroup
        ]);
    }

    // FUNCION PARA ELIMINAR LOS DATOS DE LOS INSTRUCTORES ASOCIADOS A UNA FICHA
    public function removeInstructorFromGroup(Request $request, $group_id){
        $instructor_id = $request->input('instructor_id');
    
        DB::table('instructor_groups')
            ->where('instructor_id', $instructor_id)
            ->where('group_id', $group_id)
            ->delete();
    
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }

}
