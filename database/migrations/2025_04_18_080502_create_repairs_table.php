<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id(); // Clave primaria para la reparación
            $table->foreignId('bike_id')->constrained('bikes')->onDelete('cascade'); // Relación con la tabla bikes
            $table->text('description'); // Descripción del fallo o la reparación
            $table->timestamp('repair_date')->nullable(); // Fecha de la reparación
            $table->timestamps(); // Campos de tiempo (created_at y updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
