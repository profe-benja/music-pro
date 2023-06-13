<?php

use App\Models\Tarjeta\Banco;
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
        Schema::create('tarjeta_banco', function (Blueprint $table) {
          $table->id();
          $table->string('code');
          $table->string('nombre');
          $table->string('token', 100);
          $table->string('img')->nullable();
          $table->string('url')->nullable();
          $table->json('integrations')->nullable();
          $table->boolean('disponible')->default(true);
          $table->boolean('activo')->default(true);
          $table->timestamps();
        });

        $b = new Banco();
        $b->id = 1;
        $b->code = 'BEATPAY';
        $b->nombre = 'BEATPAY VIRTUAL';
        $b->token = 'BEATPAYPASS';
        $b->save();

        $b = new Banco();
        $b->nombre = 'BANCO ESTADO';
        $b->code = 'BANCOESTADO';
        $b->token = 'BANCOESTADOTEST';
        $b->disponible = false;
        $b->save();

        // GRUPO DAEMON SECCION 008D
        $b = new Banco();
        $b->nombre = 'DAEMON PAY';
        $b->code = 'DAEMON';
        $b->token = 'DAEMON123';
        $b->disponible = true;
        $b->save();

        // GRUPO DAEMON SECCION 004D
        $b = new Banco();
        $b->nombre = 'FREECODE PAY';
        $b->code = 'FREECODE';
        $b->token = 'FREECODE123';
        $b->disponible = true;
        $b->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjeta_banco');
    }
};
