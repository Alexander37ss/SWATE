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
            'password'  => '$2y$10$4obaprbVkZFfJ0mSqDUOCuvdzimObAQh5YD63nCEl/xa/X61NFJ72'
        ]);
    }
}
