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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('IdPrestamo');
            $table->unsignedBigInteger('AlumnoNoControl');
            $table->date('FechaPrestamo');
            $table->unsignedBigInteger('HerramientaIdHerramienta');
            $table->integer('CantidadPrestada');
            $table->date('FechaDevolucion')->nullable();
            $table->integer('CantidadDevuelta')->nullable();
            $table->string('Observaciones', 255)->nullable();
            $table->string('Status')->nullable();
            $table->timestamps();

            $table->foreign('AlumnoNoControl')->references('NoControl')->on('alumnos');
            $table->foreign('HerramientaIdHerramienta')->references('IdHerramienta')->on('herramientas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
