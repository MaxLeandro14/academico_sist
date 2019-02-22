<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_aluno');
            $table->string('sexo');
            $table->string('codigo_aluno');
            $table->date('data_nascimento');
            $table->string('cpf');
            $table->string('fone');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('profissao_pai');
            $table->string('profissao_mae');
            $table->string('telefone_profissao_pai');
            $table->string('telefone_profissao_mae');
            $table->string('pai_mae_responsavel');
            $table->string('outro_responsavel_nome')->nullable();
            $table->string('outro_responsavel_parentesco')->nullable();
            $table->string('outro_responsavel_endereco')->nullable();
            $table->string('outro_responsavel_telefone')->nullable();
            $table->string('colegio_procedencia');
            $table->string('cidade_colegio_procedencia');
            $table->string('uf_colegio_procedencia');
            $table->string('situacao_procedencia');
            $table->string('cep');
            $table->date('data_matricula');
            $table->date('data_cancelamento')->nullable();
            $table->string('valor_matricula');
            $table->string('status')->default('ATIVO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
