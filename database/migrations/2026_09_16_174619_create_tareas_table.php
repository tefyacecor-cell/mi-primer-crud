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
        Schema::create('tareas', function (Blueprint $table) 
        {
            $table->id();
            $table->string('titulo', 150);
            $table->text('descripcion')->nullable();
            $table->boolean('completada')->default(false);
            $table->date('fecha_limite')->nullable();
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**p
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
 // created_at y updated_at
