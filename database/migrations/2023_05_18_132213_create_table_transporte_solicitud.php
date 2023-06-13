<?php

use App\Models\Transporte\Solicitud;
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
      Schema::create('transporte_solicitud', function (Blueprint $table) {
        $table->id();
        // ORIGEN
        $table->string('codigo_seguimiento')->nullable();
        $table->string('tipo')->nullable(); //bodega o cliente - B o C

        $table->string('nombre_origen')->nullable();
        $table->string('direccion_origen')->nullable();
        $table->string('nombre_destino')->nullable();
        $table->string('direccion_destino')->nullable();
        $table->string('comentario')->nullable();

        $table->string('id_repartidor')->nullable();

        $table->string('nombre_entrega')->nullable();
        $table->string('foto_entrega')->nullable();

        $table->integer('estado')->default(0); // 0: en proceso, 1: en camino, 2: entregado
        $table->json('info')->nullable();
        $table->timestamps();
      });

      $faker = Faker\Factory::create('es_ES');

      for ($i=0; $i < 100; $i++) {
        $s = new Solicitud();
        $s->codigo_seguimiento = substr(time(), 1, 5) . 'MUSICPRO' . rand(100000, 999999);
        $s->tipo = rand(0,1) == 1 ? 'SUCURSAL' : 'BODEGA';
        $s->nombre_origen = $faker->name();
        $s->direccion_origen = $faker->address();

        $s->nombre_destino = $faker->name();
        $s->direccion_destino =  $faker->address();

        $s->comentario = $i%2 == 0 ? $faker->text(100) : null;
        $s->estado = rand(0,2);
        $s->save();

      }
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
