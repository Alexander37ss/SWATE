<?php

namespace Database\Seeders;

use App\Models\Tipo_tramite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tipo_tramite::create([
            'nombre' => 'constancia'
        ]);
        Tipo_tramite::create([
            'nombre' => 'pase salida'
        ]);
        Tipo_tramite::create([
            'nombre' => 'justificante'
        ]);

    }
}
