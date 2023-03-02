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
            $table->unsignedBigInteger('tramite_id');
            
            $table->string('motivo');
            $table->string('motivo_otro');
            $table->string('nom_tutor');
            # $table->img('INE_img');
            # $table->img('motivo_img');
            $table->string('fecha');
            
            $table->timestamps();

            $table->foreign('tramite_id')->references('id')->on('tramites');
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
