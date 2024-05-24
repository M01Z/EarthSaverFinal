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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('carbon_emission');
            $table->integer('discount1');
            $table->integer('discount2');
            $table->integer('discount3');
            $table->unsignedBigInteger('vendorId');
            $table->foreign('vendorId')->references('id')->on('vendors');
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
