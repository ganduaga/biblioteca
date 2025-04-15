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
        Schema::create('libro_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("usuario_id");
            $table->unsignedBigInteger("libro_id");
            $table->date("fechaprestamo")->nullable();
            $table->date("fechadevolucion")->nullable();
            $table->timestamps();
            $table->foreign("usuario_id")->references("id")->on("usuarios");
            $table->foreign("libro_id")->references("id")->on("libros");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro_usuarios');
    }
};
