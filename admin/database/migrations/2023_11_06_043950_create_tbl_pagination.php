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
        Schema::create('tbl_pagination', function (Blueprint $table) {
            $table->increments('pagination_id');
            $table->string('pagination_tbl');
            $table->integer('pagination_primaryKey');
            $table->integer('pagination_category');
            $table->string('pagination_nameElement');
            $table->integer('pagination_limit');
            $table->integer('pagination_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pagination');
    }
};
