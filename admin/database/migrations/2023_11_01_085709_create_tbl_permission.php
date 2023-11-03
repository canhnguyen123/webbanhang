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
        Schema::create('tbl_permission', function (Blueprint $table) {
            $table->increments('permission_id');
            $table->integer('permission_group_id');
            $table->string('permission_router');
            $table->string('permission_name');
            $table->string('permission_code');
            $table->string('permission_node');
            $table->integer('permission_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_permission');
    }
};
