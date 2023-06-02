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
        Schema::create('sucursal_detalle_boleta', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_boleta');
            $table->foreign('id_boleta')->references('id')->on('sucursal_boleta');

            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('sucursal_producto');

            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('total');
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
        Schema::dropIfExists('sucursal_detalle_boleta');
    }
};
