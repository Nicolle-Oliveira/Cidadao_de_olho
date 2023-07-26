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
        Schema::create('deputados', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nomeServidor');
            $table->string('partido');

            //Alguns deputados listados na API não possuem algumas das informações abaixo
            //Como não apresentam dados necessários futuramente, permiti nullable()
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('sitePessoal')->nullable();
            $table->string('atividadeProfissional')->nullable();

            $table->string('naturalidadeMunicipio');
            $table->string('naturalidadeUf');
            $table->string('dataNascimento');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deputados');
    }
};
