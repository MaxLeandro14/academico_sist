<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor_parcela');
            $table->string('mes_parcela');
            $table->string('status');
            $table->string('data_pagamento');

            
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
        Schema::dropIfExists('parcelas');
    }
}
