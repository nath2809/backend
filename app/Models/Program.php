<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

        // MODELO DE LA TABLA PROGRAMAS

        protected $fillable = [
            'name',
            'description',
            'grade_to_get',
            'skills_to_develop',
        ];
}
