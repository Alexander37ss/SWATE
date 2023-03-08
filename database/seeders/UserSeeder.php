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
            'name'      => 'ALEXANDER PALAZUELOS BELTRAN',
            'email'     => 'alexander@gmail.com',
            'password'  => bcrypt('12345678')

        ])->assignRole('alumno');

        User::create([
            'name'      => 'Orientadora',
            'email'     => 'orientadora@gmail.com',
            'password'  => bcrypt('12345678')

        ])->assignRole('admin');
}
}
