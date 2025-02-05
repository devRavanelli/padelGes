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
        Schema::create('franjas_horarias', function (Blueprint $table) {
            $table->id(); // ID único para cada franja horaria
            $table->time('hora_inicio'); // Hora de inicio de la franja
            $table->timestamps(); // created_at y updated_at para seguimiento
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franjas_horarias');
    }
};
