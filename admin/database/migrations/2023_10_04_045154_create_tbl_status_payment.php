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
        Schema::create('tbl_statusPayment', function (Blueprint $table) {
            $table->increments('statusPayment_id');
            $table->string('statusPayment_name');
            $table->string('statusPayment_code');
            $table->string('statusPayment_status');
            $table->string('statusPayment_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_statusPayment');
    }
};
