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
         $this->call(UsersTbableSeeder::class);
         $this->call(DisciplinaTableSeeder::class);         
         $this->call(DisciplinaNivelTableSeeder::class);
         $this->call(ProfessorTableSeeder::class);
    }
}
