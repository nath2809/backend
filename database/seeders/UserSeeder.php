<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name'=> 'Sebastian',
            'firstname'=> 'Sanchez',
            'lastname'=> 'Osorio',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790079',
            'email' => 'sanchezz3s47@gmail.com',
            'phone_number'=> '3052863149',
            'emergency_contact'=> '3052863149',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
            
        ]);

        User::create([
            'name'=> 'Miguel',
            'firstname'=> 'Paez',
            'lastname'=> 'Paez',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790078',
            'email' => 'migue3s40@gmail.com',
            'phone_number'=> '3052863148',
            'emergency_contact'=> '3052863148',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
            
        ]);

        User::create([
            'name'=> 'Juan Diego',
            'firstname'=> 'Canola',
            'lastname'=> 'pepe',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790077',
            'email' => 'juan3s40@gmail.com',
            'phone_number'=> '3052863147',
            'emergency_contact'=> '3052863147',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
           
        ]);

        User::create([
            'name'=> 'Kevin Leonardo',
            'firstname'=> 'Leo',
            'lastname'=> 'ramirez',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790076',
            'email' => 'kevin3s40@gmail.com',
            'phone_number'=> '3052863146',
            'emergency_contact'=> '3052863146',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
        ]);

        User::create([
            'name'=> 'Robinson Lemus',
            'firstname'=> 'Nose',
            'lastname'=> 'Pripra',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790075',
            'email' => 'Robinson3s40@gmail.com',
            'phone_number'=> '3052863145',
            'emergency_contact'=> '3052863145',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
        ]);

        User::create([
            'name'=> 'Raul',
            'firstname'=> 'Garcia',
            'lastname'=> 'Pripro',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790074',
            'email' => 'Raul3s40@gmail.com',
            'phone_number'=> '3052863144',
            'emergency_contact'=> '3052863144',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
        ]);

        User::create([
            'name'=> 'Nathalia',
            'firstname'=> 'Moncada',
            'lastname'=> 'Pripri',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790073',
            'email' => 'Natha3s40@gmail.com',
            'phone_number'=> '3052863143',
            'emergency_contact'=> '3052863143',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
        ]);

        User::create([
            'name'=> 'Sebastian',
            'firstname'=> 'Bocanegra',
            'lastname'=> 'Pripre',
            'type_document'=> 'Cedula de Ciudadania',
            'document_number'=> '1004790072',
            'email' => 'Bocanegra3s40@gmail.com',
            'phone_number'=> '3052863142',
            'emergency_contact'=> '3052863142',
            'birthdate' => '2003-12-23',
            'password' => Hash::make(123),
            'image_profile' => 'gato.jpg',
        ]);

    }
}
