<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_professor');
            $table->unsignedInteger('id_funcionario');
            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            $table->unsignedInteger('id_cargo');
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->boolean('primeiro_login')->nullable();
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
        Schema::dropIfExists('professors');
    }
}
