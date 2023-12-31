<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'student_id'
    ];

    public function group(){
        return $this->belongsToMany(Group::class);
    }
}
