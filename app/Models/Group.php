<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

     // MODELO DE LA TABLA FICHAS

    protected $fillable = [
        'program_id',
        'status',
        'start_date',
        'ending_date',
        'tab_leader_id',
    ];

    // GENERAR LA RELACION DE MUCHOS A MUCHOS ENTRE LA TABLA USERS Y LAS TABLAS HIJAS 

    //----------------------\\

    public function users(){
        return $this->belongsToMany(User::class);
    }

    //----------------------\\

    public function instructor(){
        return $this->belongsToMany(InstructorGroup::class);
    }

    //----------------------\\

    public function student(){
        return $this->belongsToMany(StudentGroup::class);
    }

}
