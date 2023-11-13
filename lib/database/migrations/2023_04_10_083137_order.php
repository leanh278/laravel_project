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
        Schema::dropIfExists('order');
        Schema::create('order', function (Blueprint $table) {
            $table->id('ord_id');
            $table->string('ord_date');
            $table->string('ord_name');
            $table->string('ord_phone');
            $table->string('ord_address');
            $table->string('ord_note');
            $table->integer('ord_cus')->unsigned()->index()->nullable();
            $table->foreign('ord_cus')->references('par_id')->on('be_partition')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
