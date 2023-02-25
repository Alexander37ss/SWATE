<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumno::create([
            'edad'      => 16,
            'fecha_nacimiento'      => '01/08/05',  
            'domicilio'      => 'Villas del Rio. Culiacán, Sinaloa.',  
            'telefono'      => '6673012082',  
            'modalidad'      => 'Presencial',  

            'carrera' => 'ELECTRÓNICA', 
            'generacion' => '2018-2021', 
            'turno' => 'vespertino', 
            'semestre'=> '6', 
            'grupo' => '6A', 
            'numero_control' => '18325061070062', 
            'nombre' => 'ALEXANDER', 
            'paterno' => 'PALAZUELOS',
            'materno' => 'BELTRAN', 
            'nombre_completo' => 'ALEXANDER PALAZUELOS BELTRAN', 
            'curp' => 'NACD030427HSLVRMA0', 
            'sexo' => 'H'
        ]);
    }
}
