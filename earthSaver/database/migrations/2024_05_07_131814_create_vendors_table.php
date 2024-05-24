<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('carbonStrategy', 2000)->nullable();
            $table->unsignedBigInteger('industryId')->nullable();
            $table->foreign('industryId')->references('id')->on('industries');
            $table->foreign('userId')->references('id')->on('eusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
