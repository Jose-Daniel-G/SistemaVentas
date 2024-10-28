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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('pais', 100);
            $table->string('nombre_empresa', 255);
            $table->string('tipo_empresa', 100);
            $table->string('nit', 50)->unique();
            $table->string('telefono', 20);
            $table->string('correo')->unique();
            $table->decimal('cantidad_impuesto', 10, 2);
            $table->string('nombre_impuesto', 100);
            $table->string('moneda');
            $table->text('direccion');
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('codigo_postal', 20);
            $table->text('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
