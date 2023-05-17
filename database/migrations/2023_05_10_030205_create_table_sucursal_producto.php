<?php

use App\Services\Preload\ProductoPreload;
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
        Schema::create('sucursal_producto', function (Blueprint $table) {
          $table->id();
          $table->string('codigo')->nullable();
          $table->string('nombre');
          $table->string('descripcion', 500)->nullable();
          $table->integer('precio')->default(0);

          $table->json('assets')->nullable();

          // Es ilimitado o tiene un limite
          $table->integer('stock')->default(0);
          $table->integer('stock_critico')->default(0);

          $table->unsignedBigInteger('id_usuario');
          $table->foreign('id_usuario')->references('id')->on('sucursal_usuario');

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
        Schema::dropIfExists('sucursal_producto');
    }
};
