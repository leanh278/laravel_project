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
        Schema::dropIfExists('order_bill');
        Schema::create('order_bill', function (Blueprint $table) {
            $table->id('bill_id');
            $table->string('bill_date');
            $table->string('bill_name');
            $table->string('bill_phone');
            $table->string('bill_address');
            $table->string('bill_note');
            $table->string('bill_total');
            $table->unsignedBigInteger('bill_cus')->index()->nullable();
            $table->foreign('bill_cus')->references('cus_id')->on('customer')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_bill');
    }
};
