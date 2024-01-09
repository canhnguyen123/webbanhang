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
        Schema::create('tbl_blog', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->integer('staff_id');
            $table->string('blog_titel',1500);
            $table->string('blog_code');
            $table->text('blog_text');
            $table->integer('blog_start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_blog');
    }
};
