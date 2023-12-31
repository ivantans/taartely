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
            $table->foreignId("user_id")->nullable();
            $table->bigInteger("total_price")->nullable();
            $table->bigInteger("total_product")->nullable();
            $table->string("address")->nullable();
            $table->date("due_date")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("note")->nullable();
            $table->string("status")->nullable();
            $table->string("image")->nullable();
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
