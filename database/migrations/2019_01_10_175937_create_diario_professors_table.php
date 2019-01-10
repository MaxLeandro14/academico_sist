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
            $table->string('avaliacao_etapa1');
            $table->string('atividade_etapa1');
            $table->string('trabalhos_etapa1');
            $table->string('avaliacao_etapa2');
            $table->string('atividade_etapa2');
            $table->string('trabalhos_etapa2');
            $table->string('total_pontos');
            $table->string('media');
            $table->string('recuperacao');
            $table->string('media_bimestral');
            $table->string('faltas_bimestral');
            $table->string('nome_bimestre');
            $table->string('id_turma_disciplina');
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
