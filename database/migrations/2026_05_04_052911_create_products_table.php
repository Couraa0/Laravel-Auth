<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Kunci Relasi (Foreign Key) yang menghubungkan ke tabel categories
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
