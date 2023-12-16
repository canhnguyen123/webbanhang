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
        Schema::create('tbl_todolist', function (Blueprint $table) {
            $table->increments('todolist_id'); 
            $table->string('todoList_JobPerson');
            $table->string('todolist_JobRecipient');
            $table->string('todolist_name');
            $table->string('todolist_status');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_todolist');
    }
};
