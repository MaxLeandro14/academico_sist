<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sexo');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('nacionalidade');
            $table->string('cidade');
            $table->string('cep');
            $table->string('endereco');
            $table->date('data_nascimento');
            $table->string('local_nascimento');
            $table->string('uf_local_nascimento');
            $table->string('identidade');
            $table->date('data_emissao_identidade');
            $table->string('orgao_emissor');
            $table->string('uf_orgao_emissor');
            $table->string('titulo_eleitor');
            $table->string('zona');
            $table->string('secao');
            $table->string('carteira_reservista');
            $table->string('categoria');
            $table->string('ctps');
            $table->string('serie_ctps');
            $table->string('uf_ctps');
            $table->date('data_emissao_ctps');
            $table->string('pis_pasep');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('estado_civil');
            $table->string('conjuge')->nullable();
            $table->string('escolaridade');
            $table->string('grau_conclusao');
            $table->date('data_admissao');
            $table->string('salario');
            $table->unsignedInteger('id_cargo');
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->string('carga_horaria_mensal');
            $table->string('carga_horaria_semanal');
            $table->string('dias_contrato');
            $table->string('dias_prorrogacao')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
}
