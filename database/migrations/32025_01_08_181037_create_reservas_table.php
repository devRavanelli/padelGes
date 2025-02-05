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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id(); // id_reserva como clave primaria
            $table->date('fecha'); // fecha de la reserva
            $table->foreignId('id_franja')->constrained('franjas_horarias')->onDelete('cascade'); // Relación con la tabla franjas
            $table->foreignId('id_pista')->constrained('pistas')->onDelete('cascade'); // Relación con la tabla pistas
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade'); // Relación con la tabla usuarios
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
