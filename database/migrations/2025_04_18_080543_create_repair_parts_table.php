<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairPartsTable extends Migration
{
    public function up()
    {
        Schema::create('repair_parts', function (Blueprint $table) {
            $table->id(); // Clave primaria para la relación entre reparaciones y piezas
            $table->foreignId('repair_id')->constrained('repairs')->onDelete('cascade'); // Relación con repairs
            $table->foreignId('part_id')->constrained('parts')->onDelete('cascade'); // Relación con parts
            $table->integer('quantity'); // Cantidad de piezas usadas
            $table->timestamps(); // Campos de tiempo (created_at y updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('repair_parts');
    }
}
