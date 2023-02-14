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
            'nombre'    => 'Juan Perez',
            'edad'      => 18,
            'grupo'     => "6AVP",
            'sexo'      => true,  
        ]);
        
        Alumno::create([
            'nombre'    => 'Yael lopez',
            'edad'      => 19,
            'grupo'     => "6AVP",
            'sexo'      => true,  
        ]);
        
        Alumno::create([
            'nombre'    => 'Elpepe',
            'edad'      => 16,
            'grupo'     => "4AVP",
            'sexo'      => true,  
        ]);
        
        Alumno::create([
            'nombre'    => 'George R.R MARTIN',
            'edad'      => 40,
            'grupo'     => "4AVC",
            'sexo'      => true,  
        ]);
        
        Alumno::create([
            'nombre'    => 'Jazmin Juarez',
            'edad'      => 16,
            'grupo'     => "2BVF",
            'sexo'      => false,  
        ]);

        User::create([
            'name'      => 'Luis Carlos',
            'email'     => 'santillan.itc@gmail.com',
            'password'  => '1234'
        ]);
    }
}
