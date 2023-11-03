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
        Schema::create('tbl_notification', function (Blueprint $table) {
            $table->increments('notification_id');
            $table->integer('user_id');
            $table->text('notification_mess');
            $table->string('notification_category',1000);
            $table->integer('notification_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_notification');
    }
};
