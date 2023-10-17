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
        Schema::create('tbl_staff', function (Blueprint $table) {
            $table->increments('staff_id');
            $table->integer('position_id');
            $table->string('staff_code');
            $table->string('staff_fullname');
            $table->string('staff_username');
            $table->string('staff_password');
            $table->string('staff_linkimg');
            $table->string('staff_odlPass');
            $table->string('staff_email');
            $table->string('staff_phone');
            $table->string('staff_note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_staff');
    }
};
