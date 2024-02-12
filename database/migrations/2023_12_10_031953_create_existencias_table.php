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
        Schema::create('existencias', function (Blueprint $table) {
            $table->id();

            $table->string('Foto');
            $table->string('Nombre_Producto');
            $table->string('Cantidad');
            $table->string('Valor_Total');
            $table->string('Fecha_Ingreso');
            $table->string('Fecha_vencimiento');
            $table->string('Ventas_Dia');
            $table->string('Ventas_Semana');
            $table->string('Ventas_Mes');
            $table->string('venta_Anual');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('existencias');
    }
};
