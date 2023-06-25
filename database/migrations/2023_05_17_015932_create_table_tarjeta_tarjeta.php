<?php

use App\Models\Tarjeta\Tarjeta;
use App\Models\Tarjeta\Transaccion;
use App\Models\Tarjeta\Usuario;
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
        Schema::create('tarjeta_tarjeta', function (Blueprint $table) {
            $table->id();
            $table->string('nro')->unique();
            $table->string('pin')->nullable();
            $table->double('saldo', 18, 2); // 9999999999.99

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('tarjeta_usuario');

            $table->unsignedBigInteger('id_banco');
            $table->foreign('id_banco')->references('id')->on('tarjeta_banco');

            $table->timestamps();
        });

        $u = Usuario::first();

        $t = new Tarjeta();
        $t->id = 1;
        $t->id_usuario = $u->id;
        $t->nro = $u->id . '0000' . substr($u->run, 0, strlen($u->run) - 1);
        $t->id_banco = 1;
        $t->pin = '';
        $t->saldo = 100000000;
        $t->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjeta_tarjeta');
    }
};
