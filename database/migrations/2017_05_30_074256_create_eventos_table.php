<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data');
            $table->time('horario');
            $table->time('duracao');
            $table->integer('vagas');
            $table->integer('vagas_ocupadas');
            $table->integer('vagas_espera');
            $table->integer('vagas_espera_ocupadas');
            $table->integer('tipo_evento_id')->unsigned();
            $table->foreign('tipo_evento_id')
                            ->references('id')
                            ->on('tipos_evento')
                            ->onDelete('cascade');
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
        Schema::dropIfExists('eventos');
    }
}
