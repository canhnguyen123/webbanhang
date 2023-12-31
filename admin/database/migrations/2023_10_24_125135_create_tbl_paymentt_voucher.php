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
        Schema::create('tbl_paymentt_voucher', function (Blueprint $table) {
            $table->increments('paymentt_voucher_id');
            $table->integer('payment_id');
            $table->integer('voucher_id');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_paymentt_voucher');
    }
};
