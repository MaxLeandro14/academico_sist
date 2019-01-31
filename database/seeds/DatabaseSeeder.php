<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissaoSeeder::class);
         $this->call(PapelSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(DisciplinaTableSeeder::class);
         $this->call(CargoTableSeeder::class);
         factory(\App\Aluno::class, 50)->create();         
         //$this->call(ProfessorTableSeeder::class);
         //$this->call(DisciplinaNivelTableSeeder::class);
         
    }
}
