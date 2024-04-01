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
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('asistente')->nullable();
            $table->string('email_asistente')->nullable();
            $table->string('telefono_asistente')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('asistente');
            $table->dropColumn('email_asistente');
            $table->dropColumn('telefono_asistente');
        });
    }
};
