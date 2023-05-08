<?php

namespace App\Console\Commands;

use App\Models\Inf\Team;
use App\Models\Inf\Usuario;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ImportarFaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imports:faker';

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

      // $faker = Faker\Factory::create('es_ES');
      $faker = Factory::create();
      $pass = hash('sha256','123456');

      $t = new Team();
      $t->nombre = 'ganapuntos';
      $t->save();

      $t = new Team();
      $t->nombre = 'los programadores';
      $t->save();

      $t = new Team();
      $t->nombre = 'sitomanvoy';
      $t->save();

      $t = new Team();
      $t->nombre = 'los mejores';
      $t->save();

      $team_ids = Team::get()->pluck('id');
      $team_ids[] = null;

      for ($i=0; $i < 100; $i++) {
        $mail = $faker->unique()->safeEmail();

        $u = new Usuario();
        $u->nombre = $faker->firstName();
        $u->apellido = $faker->lastName();
        $u->correo = $mail;
        // $u->admin = true;
        $u->tipo_usuario =  $faker->randomElement([1,2,3]);
        $u->id_team =  $faker->randomElement($team_ids);
        $u->username = $mail;
        $u->password = $pass;
        $u->save();
      }
      $this->info("Import completed!");
    }
}
