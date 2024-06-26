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
        Schema::create('secretarias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->date('fechaNacimiento');
            $table->string('telefono', 15);
            $table->string('email', 100);
            $table->string('password', 255);
            $table->string('area', 30);
            $table->unsignedBigInteger('id_admin'); // para saber qué admin registró al médico o secretaria 
            $table->string('tipoUsuario', 10);
            $table->timestamps(); // Añade las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretarias');
    }
};
