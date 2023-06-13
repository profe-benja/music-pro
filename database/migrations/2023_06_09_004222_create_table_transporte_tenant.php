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
        Schema::create('transporte_tenant', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('token');
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->json('info')->nullable();
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('transporte_tenant');
    }
};
