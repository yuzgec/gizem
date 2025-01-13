<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();

            $table->double('price')->default(0);
            $table->double('old_price')->default(0);

/*          $table->integer('option1')->nullable();
            $table->integer('option2')->nullable();
            $table->integer('option3')->nullable();
            $table->integer('option4')->nullable();
            $table->integer('opportunity')->nullable();
            $table->integer('offer')->nullable();
            $table->integer('bestselling')->nullable();
            $table->integer('freecargo')->nullable();
            $table->double('price')->nullable();
            $table->double('old_price')->nullable();
            $table->double('campagin_price')->nullable();*/

            $table->string('external')->nullable();

            $table->boolean('status')->default(1);
            $table->integer('rank')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
};
