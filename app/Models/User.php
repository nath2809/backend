<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

     // MODELO DE LA TABLA INSTRUCTORES

    protected $fillable = [

        'name',
        'firstname',
        'lastname',
        'type_document',
        'document_number',
        'email',
        'phone_number',
        'emergency_contact',
        'birthdate',
        'status',
        'password',

    ];

    //----------------------\\

    public function fichas(){
        return $this->belongsToMany(Ficha::class);
    }

     // RELACION MUCHOS A MUCHOS

    public function roles(){
        return $this->belongsToMany(Role::class);
    }


   
}
