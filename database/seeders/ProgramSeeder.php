<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'name' => 'Tecnologo en Analisis y Desarrollo de Software',
            'description' => 'Estudiar desarrollo de software es aprender a crear programas informáticos de calidad, 
                              utilizando habilidades de programación.',

            'grade_to_get' => 'Certificado de Analisis y Desarrollo de Software.',

            'skills_to_develop' => 'Levantar los requerimientos de un proyecto y desarrollar el Software propuesto.',

            'image_program' => 'perro.jpg'
        ]);

        Program::create([
            'name' => 'Tecnico en Constenidos Audivisuales',
            'description' => 'Estudiar creación de audiovisuales implica aprender a producir contenido 
                              multimedia como videos, animaciones y gráficos en movimiento.',

            'grade_to_get' => 'Curso especial en produccion y post produccion audiovisual.',

            'skills_to_develop' => 'Realizar la post-produccion y la produccion para generar la animacion 
                                    final de acuerdo con las especificaciones del proyecto.',

            'image_program' => 'perro.jpg'
            
        ]);
        
        Program::create([
            'name' => 'Tecnico en Redes',
            'description' => 'Estudiar redes implica aprender cómo funcionan las redes de computadoras y 
                              cómo diseñar, implementar y mantener redes informáticas. ',

            'grade_to_get' => 'Certificacion en configuración y gestión de redes, seguridad de redes, 
                               solución de problemas y administración de servidores.',

            'skills_to_develop' => 'Preparar a los estudiantes para que puedan crear y administrar redes informáticas confiables 
                                    y eficientes que satisfagan las necesidades de las organizaciones.',

            'image_program' => 'perro.jpg'
            
        ]);

    }
}
