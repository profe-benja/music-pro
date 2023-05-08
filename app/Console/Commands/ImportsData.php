<?php

namespace App\Console\Commands;

use App\Models\Comuna;
use App\Models\Sede;
use App\Models\SedeUsuario;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imports:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'impo';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      try {
        if(Comuna::count() == 0){
          DB::unprepared(file_get_contents('database/imports/cities_chile.sql'));
        }
        if(Sede::count() == 0){
          DB::unprepared(file_get_contents('database/imports/sedes.sql'));
        }
        // if(Usuario::count() == 0){
          $u = new Usuario();
          $u->nombre = 'Benjamin';
          $u->apellido = 'Mora';
          $u->admin = true;
          $u->correo = 'benja.mora.torres@gmail.com';
          $u->password = hash('sha256', 'fichadocumento');
          $u->username = 'benja.mora';
          $u->save();

          $sedes = Sede::get();
          foreach ($sedes as $s) {
            $su = new SedeUsuario();
            $su->id_usuario = $u->id;
            $su->id_sede = $s->id;
            $su->save();
          }
          $this->info("Import completed!");
        // }else{
        //   $this->info("ya estan cargardas!");
        // }
      } catch (\Throwable $th) {
        $this->info("Error. " . $th);
      }
        // return Command::SUCCESS;
    }
}
