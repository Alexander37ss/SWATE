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
            'alumno_id' => 2, 
            'motivo'    => 'Motivos de salud','motivo_otro' => null,
            'del'       => 3,'al'=> 4,
            'fecha_solicitada' => '2023-03-01',
            'estatus_solicitud' => 1
        ]); 
        Pre_justificante::create([
            'alumno_id' => 1, 
            'motivo'    => 'Motivos de salud','motivo_otro' => null,
            'del'       => 3,'al'=> 8,
            'fecha_solicitada' => '2023-03-01',
            'estatus_solicitud' => 0
        ]); 
        Pre_justificante::create([
            'alumno_id' => 1, 
            'motivo'    => 'Motivos de prueba','motivo_otro' => null,
            'del'       => 4,'al'=> 10,
            'fecha_solicitada' => '2023-03-01',
            'estatus_solicitud' => 0
        ]); 
        
        Pre_justificante::create([
            'alumno_id' => 2, 
            'motivo'    => 'Motivos de salud','motivo_otro' => null,
            'del'       => 3,'al'=> 20,
            'fecha_solicitada' => '2023-03-01',
            'estatus_solicitud' => 1
        ]); 

        Pre_justificante::create([
            'alumno_id' => 2, 
            'motivo'    => 'Motivos de salud','motivo_otro' => null,
            'del'       => 4, 'al' => 22,
            'fecha_solicitada' => '2023-03-10',
            'estatus_solicitud' => 1
        ]);
        
        Pre_justificante::create([
            'alumno_id' => 8, 
            'motivo'    => 'Motivo vacacional','motivo_otro' => null,
            'del'       => 3,'al'=> 4,
            'fecha_solicitada' => '2023-03-02',
            'estatus_solicitud' => 0
        ]);        
        
        Pre_justificante::create([
            'alumno_id' => 79, 
            'motivo'    => 'Motivo vacacional','motivo_otro' => null,
            'del'       => 3,'al'=> 4,
            'fecha_solicitada' => '2023-03-02',
            'estatus_solicitud' => 0
        ]);

        Pre_justificante::create([
            'alumno_id' => 79, 
            'motivo'    => 'Motivo vacacional','motivo_otro' => null,
            'del'       => 3,'al'=> 4,
            'fecha_solicitada' => '2023-03-02',
            'estatus_solicitud' => 0
        ]);
        
        Pre_justificante::create([
            'alumno_id' => 45, 
            'motivo'    => 'Motivo de perdida','motivo_otro' => null,
            'del'       => 3, 'al'=> 4,
            'fecha_solicitada' => '2023-03-03',
            'estatus_solicitud' => 0
        ]);

        Pre_justificante::create([
            'alumno_id' => 45, 
            'motivo'    => 'Motivo de perdida','motivo_otro' => null,
            'del'       => 3, 'al'=> 4,
            'fecha_solicitada' => '2023-03-04',
            'estatus_solicitud' => 2
        ]);

        Pre_justificante::create([
            'alumno_id' => 45, 
            'motivo'    => 'Otro','motivo_otro' => 'Dentista',
            'del'       => 3, 'al'=> 4,
            'fecha_solicitada' => '2023-03-05',
            'estatus_solicitud' => 0
        ]);

        Pre_justificante::create([
            'alumno_id' => 45, 
            'motivo'    => 'Otro','motivo_otro' => 'Dentista',
            'del'       => 3, 'al'=> 4,
            'fecha_solicitada' => '2023-03-06',
            'estatus_solicitud' => 2
        ]);

        Pre_justificante::create([
            'alumno_id' => 79, 
            'motivo'    => 'Otro','motivo_otro' => 'Se quedo dormido',
            'del'       => 4, 'al'        => 5,
            'fecha_solicitada' => '2023-03-06',
            'estatus_solicitud' => 2
        ]);

        Pre_justificante::create([
            'alumno_id' => 79, 
            'motivo'    => 'Otro','motivo_otro' => 'Se le fue el camión',
            'del'       => 3, 'al'        => 4,
            'fecha_solicitada' => '2023-03-07',
            'estatus_solicitud' => 2
        ]);

    }
}
