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
        Schema::create('sucursal_bodega_solicitud_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('sucursal_bodega_solicitud_id');
            $table->integer('producto_id');
            $table->integer('cantidad');
            $table->double('precio', 10,2);
            $table->double('total', 10,2);
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
        Schema::dropIfExists('sucursal_bodega_solicitud_detalle');
    }
};
