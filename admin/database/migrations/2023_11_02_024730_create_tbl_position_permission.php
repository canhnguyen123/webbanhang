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
        Schema::create('tbl_position_permission', function (Blueprint $table) {
            $table->increments('position_permission_id');
            $table->integer('position_id');
            $table->integer('permission_group_id');
            $table->integer('position_permission_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_position_permission');
    }
};
