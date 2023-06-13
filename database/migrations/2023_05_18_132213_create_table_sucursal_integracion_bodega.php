<?php

use App\Models\Sucursal\BodegaAPI;
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
      Schema::create('sucursal_bodega_api', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->nullable();
        $table->string('code')->nullable();
        $table->string('usuario')->nullable();
        $table->string('secret_key')->nullable();
        $table->json('info')->nullable();
        $table->timestamps();
      });


      $b = new BodegaAPI();
      $b->id = 1;
      $b->nombre = 'MUSICPRO';
      $b->code = 'MUSICPRO';
      $b->usuario = 'MUSICPRO';
      $b->secret_key = 'MUSICPRO123';
      $b->save();

      $b = new BodegaAPI();
      $b->id = 2;
      $b->nombre = 'CODECONCLAVE';
      $b->code = 'CODECONCLAVE';
      $b->usuario = 'CODECONCLAVE';
      $b->secret_key = 'CODECONCLAVE123';
      $b->save();


      // $b = new BodegaAPI();
      // $b->id = 1;
      // $b->nombre = 'MUSICPRO';
      // $b->code = 'MUSICPRO';
      // $b->usuario = 'MUSICPRO';
      // $b->secret_key = 'MUSICPRO123';
      // $b->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal_boega_api');
    }
};
