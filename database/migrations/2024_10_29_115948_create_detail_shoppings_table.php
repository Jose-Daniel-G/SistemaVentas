<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_shoppings', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->double('purchase_price');

            $table->unsignedBigInteger('shopping_id')->nullable();
            $table->foreign('shopping_id')->references('id')->on('shoppings')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('detail_shoppings');
    }
};
