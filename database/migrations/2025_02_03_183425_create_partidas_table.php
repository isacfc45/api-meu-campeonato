<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campeonato_id')->constrained('campeonatos')->onDelete('cascade');
            $table->foreignId('time_casa_id')->constrained('times')->onDelete('cascade');
            $table->foreignId('time_fora_id')->constrained('times')->onDelete('cascade');
            $table->integer('gols_casa')->default(0);
            $table->integer('gols_fora')->default(0);
            $table->enum('fase', ['quartas', 'semifinal', 'final', '3º_lugar']);
            $table->foreignId('vencedor_id')->nullable()->constrained('times')->onDelete('set null');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};
