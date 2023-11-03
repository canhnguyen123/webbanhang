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
        Schema::create('tbl_ship', function (Blueprint $table) {
            $table->increments('ship_id');
            $table->string('ship_method');
            $table->string('ship_code');
            $table->string('ship_name');
            $table->text('ship_note');
            $table->double('ship_price');
            $table->integer('ship_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ship');
    }
};
