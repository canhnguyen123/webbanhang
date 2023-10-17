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
        Schema::create('tbl_methodPayment', function (Blueprint $table) {
            $table->increments('methodPayment_id');
            $table->string('methodPayment_name');
            $table->string('methodPayment_code');
            $table->string('methodPayment_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_methodPayment');
    }
};
