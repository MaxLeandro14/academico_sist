<?php

use Illuminate\Database\Seeder;

class DisciplinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplinas')->insert(
        	['nome_disciplina' => 'Porgutuês']
    	);
    	DB::table('disciplinas')->insert(
        	['nome_disciplina' => 'Inglês']
    	);
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'História']
        );
    	DB::table('disciplinas')->insert(
        	['nome_disciplina' => 'Geografia']
    	);
    	DB::table('disciplinas')->insert(
        	['nome_disciplina' => 'Matemática']
    	);
    	DB::table('disciplinas')->insert(
        	['nome_disciplina' => 'Arte']
    	);
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Ciências']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'E. Religioso']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Espanhol']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Ed. Física']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Física']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'História do MA']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Geografia do MA']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Química']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Biologia']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Meio Ambiente']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Redação']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Filosofia']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Literatura']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Religião']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Matemática 1']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Matemática 2']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'História 1']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'História 2']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Geografia 1']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Geografia 2']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Física 1']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Física 2']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Biologia 1']
        );
        DB::table('disciplinas')->insert(
            ['nome_disciplina' => 'Biologia 2']
        );

    }
}
