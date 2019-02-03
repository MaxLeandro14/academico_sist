<?php

use Faker\Generator as Faker;

$factory->define(App\Aluno::class, function (Faker $faker) {
        
    return [
        'nome_aluno' => addslashes($faker->name),
        'sexo'	=>	addslashes($faker->randomElements($array = array ('M','F'), $count = 1)[0]),
        'codigo_aluno' => geraCodigoAluno(),
        'data_nascimento'	=>	$faker->date($format = 'Y-m-d', $max = 'now'),
        'cpf'	=>	addslashes($faker->unique()->cpf),
        'fone'	=>	addslashes($faker->cellphoneNumber),
        'bairro'	=>	addslashes($faker->streetName),
        'endereco'	=>	addslashes($faker->address),
        'cidade'	=>	addslashes($faker->city),
        'nome_pai'	=>	addslashes($faker->name),
        'nome_mae'	=>	addslashes($faker->name),
        'profissao_pai'	=>	addslashes($faker->jobTitle),
        'profissao_mae'	=>	addslashes($faker->jobTitle),
        'telefone_profissao_pai'	=>	addslashes($faker->cellphoneNumber),
        'telefone_profissao_mae'	=>	addslashes($faker->cellphoneNumber),
        'pai_mae_responsavel'	=>	addslashes($faker->randomElements($array = array ('Pai','Mãe'), $count = 1)[0]),
        'colegio_procedencia'	=>	addslashes($faker->company),
        'cidade_colegio_procedencia'	=>	addslashes($faker->city),
        'uf_colegio_procedencia'	=>	addslashes($faker->regionAbbr),
        'situacao_procedencia'	=>	addslashes($faker->randomElements($array = array ('Cursando','Aprovado','Reprovado'), $count = 1)[0]),
        'cep'	=>	addslashes($faker->numerify('65044-###')),
        'data_matricula'	=>	$faker->date($format = 'Y-m-d', $max = 'now'),
        'valor_matricula'	=>	addslashes($faker->numberBetween($min = 100, $max = 350))
        
    ];
});
