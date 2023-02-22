<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\User;

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
            'nombre'    => 'Alexander Palazuelos Beltran',
            'no_control'    => '20325061070037',
            'edad'      => 16,
            'sexo'      => true,  
            'fecha_nacimiento'      => '01/08/05',  
            'domicilio'      => 'Villas del Rio. Culiacán, Sinaloa.',  
            'telefono'      => '6673012082',  
            'modalidad'      => 'Presencial',  
            'turno'      => 'Vespertino',  
            'grupo'      => 'A',  
            'semestre'      => 6,  
            'especialidad'      => 'Programación',  
        ]);

        User::create([
            'name'      => 'Alexander Palazuelos Beltran',
            'email'     => 'alexander@gmail.com',
            'password'  => '$2y$10$4obaprbVkZFfJ0mSqDUOCuvdzimObAQh5YD63nCEl/xa/X61NFJ72'
        ]);
    }
}
