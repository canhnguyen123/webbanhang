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
        Schema::create('tbl_payment_deatil', function (Blueprint $table) {
            $table->increments('payment_deatil_id');
            $table->integer('payment_id');
            $table->integer('product_id');
            $table->double('product_price');
            $table->string('product_size');
            $table->string('product_color');
            $table->string('product_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_payment_deatil');
    }
};
