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
        Schema::create('tbl_permission_group_group', function (Blueprint $table) {
            $table->increments('permission_group_id');
            $table->string('permission_group_name');
            $table->string('permission_group_code');
            $table->string('permission_group_node');
            $table->integer('permission_group_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_permission_group__group');
    }
};
