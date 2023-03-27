<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramite_detalles', function (Blueprint $table) {
            $table->id();
            
            $table->string('motivo');
            $table->string('motivo_otro')->nullable(); # No siempre seleccionaran otro motivo
            $table->string('nom_tutor')->nullable(); # No se ocupa en Justificante
            # $table->img('INE_img');
            # $table->img('motivo_img');
            $table->date('fecha_solicitada');

            $table->string('del')->nullable(); # Solo se usa para justificante
            $table->string('al')->nullable(); # Solo se usa para justificante
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tramite_detalles');
    }
};
