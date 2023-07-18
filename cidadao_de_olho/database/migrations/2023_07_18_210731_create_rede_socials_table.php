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
        Schema::create('rede_socials', function (Blueprint $table) {
            $table->id();
            $table->integer('id_deputado');
            $table->integer('id_rede');
            $table->string('nome');
            $table->string('url');
            $table->string('url_deputado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rede_socials');
    }
};
