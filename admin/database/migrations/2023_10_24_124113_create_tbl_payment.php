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
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->integer('user_id');
            $table->string('payment_localtion',1000);
            $table->string('payment_addressUser',1000);
            $table->integer('methodPayment_id');
            $table->integer('statusPayment_id');
            $table->integer('isPayment');
            $table->integer('payment_phoneUser');
            $table->string('payment_nameUser');
            $table->text('payment_note');
            $table->double('statusPayment_allPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_payment');
    }
};
