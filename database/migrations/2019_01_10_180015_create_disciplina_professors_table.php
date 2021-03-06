<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina_professors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_disciplina');
            $table->foreign('id_disciplina')->references('id')->on('disciplinas');
            
            $table->unsignedInteger('id_professor');
            $table->foreign('id_professor')->references('id')->on('professors');
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
        Schema::dropIfExists('disciplina_professors');
    }
}
