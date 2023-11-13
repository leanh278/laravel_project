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
        Schema::dropIfExists('customer');
        Schema::create('customer', function (Blueprint $table) {
            $table->id('cus_id');
            $table->string('cus_name');
            $table->string('cus_email');
            $table->string('cus_slug');
            $table->string('cus_password');
            $table->string('cus_img');
            $table->rememberToken();
            $table->integer('cus_par')->unsigned()->index()->nullable();
            $table->foreign('cus_par')->references('par_id')->on('be_partition')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};