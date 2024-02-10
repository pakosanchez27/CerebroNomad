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
        Schema::create('patients', function (Blueprint $table) {

            //Atributos de la tabla
            $table->id();
            $table->string('name');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('num_identificacion');
            $table->string('email');
            $table->string('telefono');
            $table->string('tipo_sangre');
            $table->text('descripcion_medica');

            //llaves foraneas
           
            $table->unsignedBigInteger('insurance_id');
            $table->unsignedBigInteger('doctor_id');
            

            //Relaciones}
           
            $table->foreign('insurance_id')->references('id')->on('insurances');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
