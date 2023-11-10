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
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_username');
            $table->string('user_fullname');
            $table->string('user_pasword');
            $table->string('user_code');
            $table->string('user_passwordOld');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_linkImg');
            $table->string('user_address');
            $table->string('user_categoryAccount');
            $table->string('user_money');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user');
    }
};
