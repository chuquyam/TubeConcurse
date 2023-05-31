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
        Schema::create('matricula', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_codconcurso')->unsigned();

            $table->string('id_nomedocargo');
            $table->float('valordocurso');
            $table->integer('idade');
            $table->string('email');

            $table->timestamps();

            $table->foreign('id_codconcurso')->references('id')->on('concursos')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matricula');
    }
};
