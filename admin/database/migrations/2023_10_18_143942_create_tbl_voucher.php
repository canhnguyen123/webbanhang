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
        Schema::create('tbl_voucher', function (Blueprint $table) {
            $table->increments('voucher_id');
            $table->string('voucher_code');
            $table->string('voucher_name');
            $table->integer('voucher_isLimit');
            $table->double('voucher_quantity');
            $table->double('voucher_number');
            $table->string('voucher_unit');
            $table->string('voucher_condition');
            $table->text('voucher_note');
            $table->string('voucher_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_voucher');
    }
};
