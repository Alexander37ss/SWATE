<?php

namespace Database\Seeders;

use App\Models\Pre_justificante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreJustificanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pre_justificante::create([
            'nombre_solicitante' => 'ALEXANDER PALAZUELOS BELTRAN', 
            'motivo'    => 'Motivos de salud',
            'motivo_otro' => null,
            'del'       => 3,
            'al'        => 4,
            'fecha_solicitada' => '2023-03-01',
            'estatus_solicitud' => 0
        ]);        
        
        Pre_justificante::create([
            'nombre_solicitante' => 'ALEXANDER PALAZUELOS BELTRAN', 
            'motivo'    => 'Motivo vacacional',
            'motivo_otro' => null,
            'del'       => 3,
            'al'        => 4,
            'fecha_solicitada' => '2023-03-02',
            'estatus_solicitud' => 0
        ]);        
        
        Pre_justificante::create([
            'nombre_solicitante' => 'ALEXANDER PALAZUELOS BELTRAN', 
            'motivo'    => 'Motivo vacacional',
            'motivo_otro' => null,
            'del'       => 3,
            'al'        => 4,
            'fecha_solicitada' => '2023-03-02',
            'estatus_solicitud' => 0
        ]);
        
        Pre_justificante::create([
            'nombre_solicitante' => 'ALEXANDER PALAZUELOS BELTRAN', 
            'motivo'    => 'Motivo de perdida',
            'motivo_otro' => null,
            'del'       => 3,
            'al'        => 4,
            'fecha_solicitada' => '2023-03-03',
            'estatus_solicitud' => 0
        ]);

        Pre_justificante::create([
            'nombre_solicitante' => 'ALEXANDER PALAZUELOS BELTRAN', 
            'motivo'    => 'Otro',
            'motivo_otro' => 'Dentista',
            'del'       => 3,
            'al'        => 4,
            'fecha_solicitada' => '2023-03-03',
            'estatus_solicitud' => 0
        ]);

    }
}
