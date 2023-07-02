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
        Schema::create('sucursal_bodega_solicitud', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bodega');
            $table->double('total', 10,2);
            $table->integer('estado')->default(1); // 1: creado, 2: enviado, 3: recibido
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
        Schema::dropIfExists('sucursal_bodega_solicitud');
    }
};
