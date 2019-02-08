<?php

use Illuminate\Database\Seeder;

class UFTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('u_f_s')->insert(
        	['UF' => 'MA','Estado' => 'Maranhão']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'AC','Estado' => 'Acre']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'AL','Estado' => 'Alagoas']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'AM','Estado' => 'Amazonas']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'BA','Estado' => 'Bahia']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'CE','Estado' => 'Ceará']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'DF','Estado' => 'Distrito Federal']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'ES','Estado' => 'Espírito Santo']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'GO','Estado' => 'Goiás']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'MT','Estado' => 'Mato Grosso']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'MS','Estado' => 'Mato Grosso do Sul']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'MG','Estado' => 'Minas Gerais']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'PA','Estado' => 'Pará']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'PB','Estado' => 'Paraíba']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'PR','Estado' => 'Paraná']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'PE','Estado' => 'Pernambuco']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'PI','Estado' => 'Piauí']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'RJ','Estado' => 'Rio de Janeiro']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'RN','Estado' => 'Rio Grande do Norte']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'RS','Estado' => 'Rio Grande do Sul']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'RO','Estado' => 'Rondônia']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'RR','Estado' => 'Roraima']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'SC','Estado' => 'Santa Catarina']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'SP','Estado' => 'São Paulo']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'SE','Estado' => 'Sergipe']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'TO','Estado' => 'Tocantins']
    	);
    	DB::table('u_f_s')->insert(
        	['UF' => 'ET','Estado' => 'Estrangeiro']
    	);
    }
}
