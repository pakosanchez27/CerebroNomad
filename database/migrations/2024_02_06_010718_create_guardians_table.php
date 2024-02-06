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
        Schema::create('guardians', function (Blueprint $table) {

            //Atributos de la tabla
            $table->id();
            $table->string('name');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('edad');
            $table->string('email');
            $table->string('telefono');
            $table->string('parentesco');

            //llaves foraneas
            $table->unsignedBigInteger('patients_id');

            //Relaciones
            $table->foreign('patients_id')->references('id')->on('patients');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
