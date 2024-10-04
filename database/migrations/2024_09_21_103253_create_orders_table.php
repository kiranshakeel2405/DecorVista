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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('customer_details')->onDelete('cascade');
            $table->double('grand_total',10,2);

            //User related fieids

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->text('address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('mobile');
            $table->string('notes')->nullable();
            
            $table->enum('payment_status',['pending','Complete'])->default('pending');
            $table->enum('delivery_status',['pending','shipped','delivered','cancelled'])->default('pending');
            $table->timestamp('shipping_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
