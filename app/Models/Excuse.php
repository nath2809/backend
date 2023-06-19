<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excuse extends Model
{
    use HasFactory;

        // MODELO DE LA TABLA STUDENT_EXCUSES

        protected $fillable = [
            'student_id',
            'excuse'
    ];
}
