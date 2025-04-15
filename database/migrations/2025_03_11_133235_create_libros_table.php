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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("ISBN")->unique();
            $table->unsignedBigInteger("autor_id");
            $table->string("portada")->nullable();
            $table->string("editorial");
            $table->string("tema");
            $table->date("fechaPublicacion");
            $table->integer("numcopias");
            $table->timestamps();
            $table->foreign("autor_id")->references("id")->on("autors");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
