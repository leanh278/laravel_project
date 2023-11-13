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
        Schema::dropIfExists('stock');
        Schema::create('stock', function (Blueprint $table) {
            $table->id('stock_id');
            $table->string('stock_quantity');
            $table->unsignedBigInteger('stock_prod')->index()->nullable();
            $table->foreign('stock_prod')->references('prod_id')->on('be_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
