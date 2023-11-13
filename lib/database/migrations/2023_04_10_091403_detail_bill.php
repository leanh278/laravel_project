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
        Schema::dropIfExists('detail_bill');
        Schema::create('detail_bill', function (Blueprint $table) {
            $table->id('btail_id');
            $table->string('btail_quantity');
            $table->unsignedBigInteger('btail_pord')->index()->nullable();
            $table->unsignedBigInteger('btail_bill')->index()->nullable();
            $table->foreign('btail_pord')->references('prod_id')->on('be_products')->onDelete('cascade');
            $table->foreign('btail_bill')->references('bill_id')->on('bill')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bill');
    }
};
