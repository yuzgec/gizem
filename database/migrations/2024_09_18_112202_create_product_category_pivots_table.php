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
        Schema::create('product_category_pivots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // products tablosuna foreign key olacak sütun
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('category_id')->references('id')->on('product_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_category_pivots');
    }
};
