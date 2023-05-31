<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coddisciplina');
            $table->string('nomedadisciplina');
            $table->string('descricao');
            $table->string('tipo');
            $table->string('link');

            $table->bigInteger('id_nomedoconcurso')->unsigned();
            $table->foreign('id_nomedoconcurso')->references('id')->on('sliders')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
