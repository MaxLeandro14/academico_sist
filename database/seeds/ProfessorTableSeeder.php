<?php

use Illuminate\Database\Seeder;

class ProfessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professors')->insert(
        	['nome_professor' => 'Professor 1']
    	);
    	DB::table('professors')->insert(
        	['nome_professor' => 'Professor 2']
    	);
    	DB::table('professors')->insert(
        	['nome_professor' => 'Professor 3']
    	);
    	DB::table('professors')->insert(
        	['nome_professor' => 'Professor 4']
    	);
    	DB::table('professors')->insert(
        	['nome_professor' => 'Professor 5']
    	);
    	DB::table('professors')->insert(
        	['nome_professor' => 'Professor 6']
    	);
    }
}
