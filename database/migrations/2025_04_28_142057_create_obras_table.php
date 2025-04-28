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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique()->unsigned()->between(100, 999);
            $table->string('nombre', 255);
            $table->string('clave')->unique();
            $table->text('objeto');
            $table->string('direccion');
            $table->decimal('latitud', 10, 7);
            $table->decimal('longitud', 10, 7);
            $table->json('galeria_imagenes'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
