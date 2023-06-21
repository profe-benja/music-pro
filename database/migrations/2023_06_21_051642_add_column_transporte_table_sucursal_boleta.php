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
        Schema::table('sucursal_boleta', function (Blueprint $table) {
          $table->string('transporte_estado')->nullable();
          $table->string('transporte_codigo')->nullable();
          $table->string('transporte_empresa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sucursal_boleta', function (Blueprint $table) {
            $table->dropColumn(['transporte_estado', 'transporte_codigo','transporte_empresa']);
        });
    }
};
