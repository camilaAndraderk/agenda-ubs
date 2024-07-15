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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $tabela->string('nome', lenght: 128);
            $tabela->string('telefone', lenght: 11);
            $tabela->string('email', lenght: 64);
            $tabela->string('logradouro', lenght: 128);
            $tabela->unsignedSmallInteger('numero', lenght: 128);
            $tabela->string('bairro', lenght: 128);
            $tabela->string('cidade', lenght: 128);
            $tabela->string('estado', lenght: 2);
            $tabela->string('cep', lenght: 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
