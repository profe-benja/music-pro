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
        $table->string('nombre');
        $table->string('code');
        $table->string('token', 100);
        $table->string('img')->nullable();
        $table->string('url')->nullable();
        $table->json('integrations')->nullable();
        $table->boolean('disponible')->default(true);
        $table->boolean('activo')->default(true);
        $table->timestamps();
      });

      $b = new BodegaAPI();
      $b->id = 1;
      $b->nombre = 'Bodega music pro';
      $b->code = 'MUSICPRO123';
      $b->url = 'https://musicpro.bemtorres.win/api/v1/bodega';
      $b->token = 'MUSICPRO123';
      $b->save();

      // $b = new BodegaAPI();
      // $b->id = 2;
      // $b->nombre = 'CODECONCLAVE';
      // $b->code = 'CODECONCLAVE';
      // $b->usuario = 'CODECONCLAVE';
      // $b->secret_key = 'CODECONCLAVE123';
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
