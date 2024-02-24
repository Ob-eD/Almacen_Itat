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
        Schema::create('herramientas', function (Blueprint $table) {
            $table->bigIncrements('IdHerramienta');
            $table->string('NombreHerramienta');
            $table->integer('CantidadExistente');
            $table->integer('CantidadDisponible');
            $table->unsignedBigInteger('CategoriaIdCategoria');
            $table->longblob('Img');
            $table->timestamps();

            $table->foreign('CategoriaIdCategoria')->references('IdCategoria')->on('Categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
