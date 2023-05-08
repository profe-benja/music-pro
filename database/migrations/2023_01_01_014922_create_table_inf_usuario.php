<?php

use App\Models\Inf\Usuario;
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
        Schema::create('inf_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->unique();
            $table->string('run')->nullable();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('username'); // mismo correo
            $table->string('password');
            $table->string('telefono')->nullable();


            $table->integer('credito')->default(0);


            $table->unsignedBigInteger('id_team')->nullable();
            $table->foreign('id_team')->nullable()->references('id')->on('inf_team');

            $table->json('integrations')->nullable();
            $table->json('info')->nullable();

            $table->integer('tipo_usuario')->default(1);
            $table->boolean('admin')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        $u = new Usuario();
        $u->correo = 'benja.mora.torres@gmail.com';
        $u->nombre = 'Benjamin';
        $u->apellido = 'Mora';
        $u->username = 'benja.mora.torres@gmail.com';
        $u->password = hash('sha256','123456');
        $u->admin = true;
        $u->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inf_usuario');
    }
};
