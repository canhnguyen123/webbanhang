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
        Schema::create('tbl_notication_admin', function (Blueprint $table) {
            $table->increments('notication_admin_id');
            $table->integer('staff_id');
            $table->string('notication_admin_content');
            $table->integer('notication_admin_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_notication_admin');
    }
};
