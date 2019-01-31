<?php

use Illuminate\Database\Seeder;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert(
        	['nome_cargo' => 'Professor(a)']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Administrador(a)']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Porteiro(a)']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Zelador(a)']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Diretor(a)']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Secretário(a)']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Assistente Pedagógico']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Surpervisor Pedagógico']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Coordenador Pedagógico']
    	);
    	DB::table('cargos')->insert(
        	['nome_cargo' => 'Orientador Educacional']
    	);
    	
    }
}
