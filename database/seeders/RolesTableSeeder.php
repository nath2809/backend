<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
  
    public function run(): void
    {
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Instructor']);
        Role::create(['name' => 'Aprendiz']);
        Role::create(['name' => 'Instructor_Aprendiz']);
    }
}
