<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('code'); // Código del libro
        $table->integer('quantity'); // Cantidad
        $table->string('title'); // Título
        $table->string('author'); // Autor
        $table->string('editorial'); // Editorial
        $table->year('year'); // Año
        $table->unsignedBigInteger('category_id'); // Relación con la categoría
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('books');
}

};
