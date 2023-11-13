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
        Schema::dropIfExists('order_detail');
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id('dtail_id');
            $table->string('dtail_quantity');
            $table->unsignedBigInteger('dtail_pord')->index()->nullable();
            $table->unsignedBigInteger('dtail_bill')->index()->nullable();
            $table->foreign('dtail_pord')->references('prod_id')->on('be_products')->onDelete('cascade');
            $table->foreign('dtail_bill')->references('bill_id')->on('bill')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
