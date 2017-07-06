<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade');
            $table->bigInteger('telefone');
            $table->bigInteger('cpf');
            $table->date('data_nascimento');
            $table->string('cidade');
            $table->string('uf', 2);
            $table->string('instituicao', 200);
            $table->string('curso');
            $table->integer('matricula');
            $table->boolean('necessidades_especiais');
            $table->string('necessidades_especiais_comentario')->nullable();
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
        Schema::dropIfExists('participantes');
    }
}
