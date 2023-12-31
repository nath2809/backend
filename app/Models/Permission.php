<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

     // MODELO DE LA TABLA DE PERMISOS

    protected $fillable = [
        'name'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }



}
