<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiarioProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diario_professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avaliacao_etapa1')->nullable();
            $table->string('atividade_etapa1')->nullable();
            $table->string('trabalhos_etapa1')->nullable();
            $table->string('avaliacao_etapa2')->nullable();
            $table->string('atividade_etapa2')->nullable();
            $table->string('trabalhos_etapa2')->nullable();
            $table->string('total_pontos')->nullable();
            $table->string('media')->nullable();
            $table->string('recuperacao')->nullable();
            $table->string('media_bimestral')->nullable();
            $table->string('faltas_bimestral')->nullable();
            $table->string('nome_bimestre')->nullable();
            $table->unsignedInteger('id_turma_disciplina');
            $table->foreign('id_turma_disciplina')->references('id')->on('turma_disciplinas');
            $table->unsignedInteger('id_disciplina');
            $table->foreign('id_disciplina')->references('id')->on('disciplinas');
            $table->unsignedInteger('id_professor');
            $table->foreign('id_professor')->references('id')->on('professors');
            $table->unsignedInteger('id_turma');
            $table->foreign('id_turma')->references('id')->on('turmas');
            $table->unsignedInteger('id_aluno');
            $table->foreign('id_aluno')->references('id')->on('alunos');
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
        Schema::dropIfExists('diario_professors');
    }
}
