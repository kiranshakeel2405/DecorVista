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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to products table
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Foreign key to users table
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // For replies
            $table->string('name'); // Name of the commenter
            $table->string('email'); // Email of the commenter
            $table->text('comment'); // The comment text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
