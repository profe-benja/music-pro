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
        Schema::create('tarjeta_transaccion', function (Blueprint $table) {
            $table->id();

            // ORIGEN
            $table->integer('id_tarjeta_origen')->nullable();
            $table->unsignedBigInteger('id_banco_origen');
            $table->foreign('id_banco_origen')->references('id')->on('tarjeta_banco');
            $table->string('code_banco_origen')->nullable();

            // DESTINO
            $table->integer('id_tarjeta_destino')->nullable();
            $table->unsignedBigInteger('id_banco_destino');
            $table->foreign('id_banco_destino')->references('id')->on('tarjeta_banco');

            $table->string('code_banco_destino')->nullable();

            // CONTENIDO
            $table->double('monto', 12, 2); // 9999999999.99
            $table->string('descripcion', 100)->nullable();
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
        Schema::dropIfExists('tarjeta_transaccion');
    }
};
