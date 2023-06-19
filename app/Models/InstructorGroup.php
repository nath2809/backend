<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'instructor_id'
    ];

    public function group(){
        return $this->belongsToMany(Group::class);
    }
}
