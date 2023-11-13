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
        Schema::dropIfExists('infouser');
        Schema::create('infouser', function (Blueprint $table) {
            $table->id('id');
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('info_prod')->index()->nullable();
            $table->foreign('info_prod')->references('prod_id')->on('be_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infouser');
    }
};
