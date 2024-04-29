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
        Schema::create('proceso_muestras', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->bigInteger(('patient_id'))->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->date('fecha_toma_muestra')->nullable();
            $table->date('fecha_envio_lab')->nullable();
            $table->date('fecha_resultado')->nullable();
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proceso_muestras');
    }
};
