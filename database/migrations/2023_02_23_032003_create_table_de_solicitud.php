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
        Schema::create('de_solicitud', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();

            $table->unsignedBigInteger('id_usuario_solicitante');
            $table->foreign('id_usuario_solicitante')->references('id')->on('inf_usuario');

            $table->unsignedBigInteger('id_usuario_entrega')->nullable();
            $table->foreign('id_usuario_entrega')->nullable()->references('id')->on('inf_usuario');

            $table->unsignedBigInteger('id_usuario_recibe')->nullable();
            $table->foreign('id_usuario_recibe')->nullable()->references('id')->on('inf_usuario');


            // $table->unsignedBigeInteger('id_transaccion')->nullable();
            // $table->foreign('id_transaccion')->nullable()->references('id')->on('rec_transaccion');

            $table->unsignedBigInteger('id_producto')->nullable();
            $table->foreign('id_producto')->nullable()->references('id')->on('de_producto');
            $table->integer('credito')->default(0);
            $table->string('nombre')->nullable();
            $table->string('descripcion',500)->nullable();

            $table->integer('estado')->default(1); // pendiente, aceptado, rechazado
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
        Schema::dropIfExists('de_solicitud');
    }
};
