<?php

use App\Models\Sucursal\BancoApi;
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
      Schema::create('sucursal_banco_api', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->nullable();
        $table->string('code')->nullable();
        $table->string('usuario')->nullable();
        $table->string('secret_key')->nullable();
        $table->json('info')->nullable();
        $table->timestamps();
      });


      $b = new BancoApi();
      $b->id = 1;
      $b->nombre = 'BEATPAY VIRTUAL';
      $b->code = 'BEATPAY';
      $b->usuario = 'BEATPAY';
      $b->secret_key = 'BEATPAY123';
      $b->save();

      $b = new BancoApi();
      $b->id = 2;
      $b->nombre = 'WEBPAY';
      $b->code = 'WEBPAY';
      $b->usuario = 'WEBPAY';
      $b->secret_key = 'WEBPAY123';
      $b->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transporte_solicitud');
    }
};
