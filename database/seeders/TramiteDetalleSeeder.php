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
        tramite_detalle::create(['motivo'=>'Motivo vacacional','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-20','del'=>1,'al'=>2]);   
        tramite_detalle::create(['motivo'=>'Motivo vacacional','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-26','del'=>1,'al'=>2]);   
        tramite_detalle::create(['motivo'=>'Motivo vacacional','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-28','del'=>1,'al'=>2]);   
        tramite_detalle::create(['motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-28','del'=>2,'al'=>3]);   
        tramite_detalle::create(['motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-02-28','del'=>2,'al'=>3]);   
        # 5
        tramite_detalle::create(['motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-01','del'=>1,'al'=>1]);   
        tramite_detalle::create(['motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-02','del'=>7,'al'=>7]);   
        tramite_detalle::create(['motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-02','del'=>7,'al'=>7]);   
        tramite_detalle::create(['motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-03','del'=>5,'al'=>8]);   
        tramite_detalle::create(['motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-04','del'=>8,'al'=>8]);   
        # 10
        tramite_detalle::create(['motivo'=>'Motivo de perdida','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-04','del'=>7,'al'=>9]);   
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Viaje educativo','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-04','del'=>7,'al'=>7]);   
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Viaje educativo','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-05','del'=>8,'al'=>8]);   
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Viaje educativo','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-05','del'=>12,'al'=>12]);   
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Reunión estudiantil','nom_tutor'=> null,'fecha_solicitada'=>'2023-03-06','del'=>17,'al'=>22]);   
        # 15
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Reunión estudiantil','nom_tutor'=> null,'fecha_solicitada'=>'2022-03-06','del'=>14,'al'=>22]);
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Citado en dirección','nom_tutor'=> null,'fecha_solicitada'=>'2022-03-07','del'=>25,'al'=>26]);  
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Citado en dirección','nom_tutor'=> null,'fecha_solicitada'=>'2022-03-07','del'=>25,'al'=>26]);
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Creando proyecto swate','nom_tutor'=> null,'fecha_solicitada'=>'2022-03-07','del'=>28,'al'=>29]); 
        tramite_detalle::create(['motivo'=>'Otro...','motivo_otro'=>'Creando proyecto sigare','nom_tutor'=> null,'fecha_solicitada'=>'2022-03-07','del'=>28,'al'=>29]);  
        # 20
        tramite_detalle::create(['motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-01','del'=>3,'al'=>4]);   
        tramite_detalle::create(['motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-01','del'=>3,'al'=>20]);   
        tramite_detalle::create(['motivo'=>'Motivo de salud','motivo_otro'=>null,'nom_tutor'=> null,'fecha_solicitada'=>'2023-03-22','del'=>4,'al'=>22]);   
    }
}
