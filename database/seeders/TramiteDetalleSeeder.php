<?php

namespace Database\Seeders;

use App\Models\tramite_detalle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TramiteDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tramite_detalle::create(['tramite_id'=>1,'motivo'=>'Motivo vacacional','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-20','del'=>1,'al'=>2]);   
        tramite_detalle::create(['tramite_id'=>2,'motivo'=>'Motivo vacacional','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-26','del'=>1,'al'=>2]);   
        tramite_detalle::create(['tramite_id'=>3,'motivo'=>'Motivo vacacional','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-28','del'=>1,'al'=>2]);   
        tramite_detalle::create(['tramite_id'=>4,'motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-28','del'=>2,'al'=>3]);   
        tramite_detalle::create(['tramite_id'=>5,'motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-28','del'=>2,'al'=>3]);   
        tramite_detalle::create(['tramite_id'=>6,'motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-01','del'=>1,'al'=>1]);   
        tramite_detalle::create(['tramite_id'=>7,'motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-02','del'=>7,'al'=>7]);   
        tramite_detalle::create(['tramite_id'=>8,'motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-02','del'=>7,'al'=>7]);   
        tramite_detalle::create(['tramite_id'=>9,'motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-03','del'=>5,'al'=>8]);   
        tramite_detalle::create(['tramite_id'=>10,'motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-04','del'=>8,'al'=>8]);   
        tramite_detalle::create(['tramite_id'=>11,'motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-04','del'=>7,'al'=>9]);   
        tramite_detalle::create(['tramite_id'=>12,'motivo'=>'Otro...','motivo_otro'=>'Viaje educativo','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-04','del'=>7,'al'=>7]);   
        tramite_detalle::create(['tramite_id'=>13,'motivo'=>'Otro...','motivo_otro'=>'Viaje educativo','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-05','del'=>8,'al'=>8]);   
        tramite_detalle::create(['tramite_id'=>14,'motivo'=>'Otro...','motivo_otro'=>'Viaje educativo','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-05','del'=>12,'al'=>12]);   
        tramite_detalle::create(['tramite_id'=>15,'motivo'=>'Otro...','motivo_otro'=>'Reunión estudiantil','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-06','del'=>17,'al'=>22]);   
        tramite_detalle::create(['tramite_id'=>16,'motivo'=>'Otro...','motivo_otro'=>'Reunión estudiantil','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-06','del'=>14,'al'=>22]);   
        tramite_detalle::create(['tramite_id'=>17,'motivo'=>'Otro...','motivo_otro'=>'Citado en dirección','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-07','del'=>25,'al'=>26]);   
    }
}
