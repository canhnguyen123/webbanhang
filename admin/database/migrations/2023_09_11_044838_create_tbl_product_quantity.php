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
        Schema::create('tbl_product_quantity', function (Blueprint $table) {
            $table->increments('productQuantity_id');
            $table->string('productQuantity_size');
            $table->string('productQuantity_color');
            $table->integer('productQuantity');
            $table->double('productQuantity_priceInt');
            $table->double('productQuantity_priceOut');
            $table->integer('productQuantity_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_product_quantity');
    }
};
