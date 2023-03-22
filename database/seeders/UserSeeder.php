<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'ALEXANDER PALAZUELOS BELTRAN','email'=>'alexander@gmail.com','password'=> bcrypt('12345678')
        ])->assignRole('alumno');

        User::create([
            'name'=>'NAVEJAS CORRALES DAMIAN EDUARDO','email'=>'damian.navejas@gmail.com','password'=> bcrypt('12345678')
        ])->assignRole('alumno');
        
        User::create([
            'name'=>'CRUZ NIEBLA ALAN PAUL','email'=>'alan.paul@gmail.com','password'=> bcrypt('12345678')
        ])->assignRole('alumno');

        User::create([
            'name'=>'Orientadora','email'=> 'orientadora@gmail.com','password'  => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name'=>'Mara','email'=>'mara@gmail.com','password'=>bcrypt('12345678')
        ])->assignRole('admin');
    }
}
