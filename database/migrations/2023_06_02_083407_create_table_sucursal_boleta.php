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
        Schema::create('sucursal_boleta', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario_solicitante')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre')->nullable();
            $table->integer('total_pagado')->nullable();
            $table->string('forma_pago')->nullable();
            $table->integer('estado')->default(0);
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
        Schema::dropIfExists('sucursal_boleta');
    }
};
