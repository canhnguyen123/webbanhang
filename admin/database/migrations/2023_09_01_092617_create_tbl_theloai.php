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
        Schema::create('tbl_theloai', function (Blueprint $table) {
            $table->increments('theloai_id');
            $table->string('theloai_name');
            $table->string('theloai_code');
            $table->text('theloai_img');
            $table->integer('category_id');
            $table->integer('phanloai_id');
            $table->integer('theloai_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_theloai');
    }
};
