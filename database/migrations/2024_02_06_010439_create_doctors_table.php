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
        Schema::create('doctors', function (Blueprint $table) {

            //Atributos de la tabla
            $table->id();
            $table->string('name');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('sexo')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('cedula')->nullable();
            $table->string('nombre_clinica')->nullable();
            $table->timestamps();
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
