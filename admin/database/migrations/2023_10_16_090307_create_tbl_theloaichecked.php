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
        Schema::create('tbl_theloaichecked', function (Blueprint $table) {
            $table->increments('theloaichecked_id');
            $table->integer('theloai_id');
            $table->integer('theloaichecked_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_theloaichecked');
    }
};
