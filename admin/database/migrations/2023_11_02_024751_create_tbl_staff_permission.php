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
        Schema::create('tbl_staff_permission', function (Blueprint $table) {
            $table->increments('staff_permission_id');
            $table->integer('position_permission_id');
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->integer('staff_permission_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_staff_permission');
    }
};
