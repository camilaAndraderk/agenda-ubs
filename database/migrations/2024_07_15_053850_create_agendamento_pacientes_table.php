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
        Schema::create('agendamento_pacientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paciente')    ->constrained('pessoas');
            $table->foreignId('id_medico')      ->constrained('pessoas');
            $table->foreignId('id_ubs')         ->constrained('pessoas_juridicas');
            $table->dateTime('data');
            $table->enum('situacao_consulta', ['Aguardando', 'Concluido','Cancelado', 'Falta']);
            $table->enum('categoria_paciente', ['Já sou um paciente', 'Primeira consulta']);
            $table->string('avaliacao_medica', 512);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento_pacientes');
    }
};
