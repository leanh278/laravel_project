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
        Schema::dropIfExists('be_products');
        Schema::create('be_products', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_name');
            $table->integer('prod_price');
            $table->string('prod_slug');
            $table->string('prod_img');
            $table->text('prod_description');
            $table->string('prod_materials');
            $table->text('prod_size');
            $table->integer('prod_cate')->unsigned()->index()->nullable();
            $table->foreign('prod_cate')->references('cate_id')->on('be_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('be_products');
    }
};
