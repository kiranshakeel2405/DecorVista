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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('category')->constrained('categories')->onDelete('cascade');
            $table->foreignId('sub_category')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand')->constrained('brands')->onDelete('cascade');
            $table->foreignId('style')->constrained('styles')->onDelete('cascade');
            $table->integer('hieght');
            $table->integer('width');
            $table->integer('depth');
            $table->text('material');
            $table->integer('price');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
