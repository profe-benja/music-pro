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
        Schema::create('de_producto', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('descripcion', 500)->nullable();
            $table->integer('precio')->default(0);

            $table->json('assets')->nullable();

            // Es ilimitado o tiene un limite
            $table->boolean('stock_ilimitado')->default(false);
            $table->integer('stock')->default(0);

            // Cantidad entregada - interno n+1
            $table->integer('cant_entregada')->nullable();

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('inf_usuario');

            $table->integer('estado')->default(1);
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('rec_transacciones');
    }
};
