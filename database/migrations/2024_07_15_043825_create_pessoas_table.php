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
            $table->string('nome', 128);
            $table->string('telefone', 16)          ->nullable();
            $table->string('email', 64)             ->nullable();
            $table->string('logradouro', 128)       ->nullable();
            $table->unsignedSmallInteger('numero')  ->nullable();
            $table->string('bairro', 128)           ->nullable();
            $table->string('cidade', 64)            ->nullable();
            $table->string('estado', 2)             ->nullable();
            $table->string('cep', 10)               ->nullable();
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
