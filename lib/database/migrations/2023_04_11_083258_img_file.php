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
        Schema::dropIfExists('img_file');
        Schema::create('img_file', function (Blueprint $table) {
            $table->id();
            $table->string('imgnames');
            $table->unsignedBigInteger('img_prod')->index()->nullable();
            $table->foreign('img_prod')->references('prod_id')->on('be_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('img_file');
    }
};
