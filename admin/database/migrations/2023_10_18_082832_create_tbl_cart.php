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
        Schema::create('tbl_cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('cart_size');
            $table->integer('cart_color');
            $table->integer('cart_price');
            $table->integer('cart_quatity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cart');
    }
};
