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
        Schema::create('pistas', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('nombre_pista'); // Nombre de la pista
            $table->text('descripcion')->nullable(); // Descripción de la pista (opcional)
            $table->string('tipo_pared')->nullable(); // Tipo de pared (ej. vidrio, cemento)
            $table->string('tipo_suelo')->nullable(); // Tipo de suelo (ej. césped, madera)
            $table->string('imagen')->nullable(); // Ruta de la imagen (opcional)
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pistas');
    }
};
