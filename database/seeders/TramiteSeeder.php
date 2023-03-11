<?php

namespace Database\Seeders;

use App\Models\tramite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 1,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 2,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 3,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 4,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 5,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 6,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 7,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 8,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 9,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 10,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 11,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 12,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 13,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 14,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 15,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 16,]);   
        tramite::create(['tipo_id'=> 3,'orientadora_id'=> 2,'alumno_id'=> 17,]);   
    }
}
