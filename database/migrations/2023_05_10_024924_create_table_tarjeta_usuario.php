<?php

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
        Schema::create('tarjeta_usuario', function (Blueprint $table) {
          $table->id();
          $table->string('correo')->unique();
          $table->string('run')->nullable();
          $table->string('nombre');
          $table->string('apellido');
          $table->string('username'); // mismo correo
          $table->string('password');
          $table->string('telefono')->nullable();

          $table->json('integrations')->nullable();
          $table->json('info')->nullable();

          $table->integer('tipo_usuario')->default(1);
          $table->boolean('admin')->default(false);
          $table->boolean('activo')->default(true);
          $table->timestamps();
        });


        $u = new Usuario();
        $u->correo = 'admin@musicpro.cl';
        $u->nombre = 'Benjamin';
        $u->apellido = 'Mora';
        $u->username = 'admin@musicpro.cl';
        $u->password = hash('sha256','123456');
        $u->run = '12345678K';
        $u->admin = true;
        $integrations = $u->integrations;
        $integrations['company'] = 'BEATPAY';
        $integrations['user'] = 'BEATPAY';
        $integrations['secret_key'] = $u->generateSecretKey();
        $u->integrations = $integrations;
        $u->save();


        $u = new Usuario();
        $u->correo = 'benja@musicpro.cl';
        $u->nombre = 'Benja';
        $u->apellido = 'torres';
        $u->username = 'benja@musicpro.cl';
        $u->password = hash('sha256','123456');
        $u->run = '13333333K';
        $u->admin = true;
        $integrations = $u->integrations;
        $integrations['company'] = 'BENJA';
        $integrations['user'] = 'BENJA';
        $integrations['secret_key'] = $u->generateSecretKey();
        $u->integrations = $integrations;
        $u->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjeta_usuario');
    }
};
