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
        Schema::create('pessoas_juridicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pessoa')->constrained('pessoas');
            $table->string('razao_social', 64)->nullable();
            $table->string('cnpj', 14);
            $table->enum('situacao', ['Ativa', 'Inativa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas_juridicas');
    }
};