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
        Schema::dropIfExists('rate');
        Schema::create('rate', function (Blueprint $table) {
            $table->id('rate_id');
            $table->integer('rate_star');
            $table->string('rate_text');
            $table->string('rate_date');
            $table->unsignedBigInteger('rate_prod')->index()->nullable();
            $table->unsignedBigInteger('rate_cus')->index()->nullable();
            $table->foreign('rate_prod')->references('prod_id')->on('be_products')->onDelete('cascade');
            $table->foreign('rate_cus')->references('cus_id')->on('customer')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate');
    }
};
