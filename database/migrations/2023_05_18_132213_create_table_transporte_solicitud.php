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
      Schema::create('transporte_solicitud', function (Blueprint $table) {
        $table->id();
        // ORIGEN
        $table->string('codigo_seguimiento')->nullable();
        $table->string('tipo')->nullable(); //bodega o cliente - B o C

        $table->string('direccion_origen')->nullable();
        $table->string('direccion_destino')->nullable();
        $table->string('comentario')->nullable();

        $table->string('id_repartidor')->nullable();

        $table->integer('estado')->default(0); // 0: en proceso, 1: en camino, 2: entregado
        $table->json('info')->nullable();
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
        Schema::dropIfExists('transporte_solicitud');
    }
};
