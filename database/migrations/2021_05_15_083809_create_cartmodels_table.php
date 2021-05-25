<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartmodels', function (Blueprint $table) {
            $table->id();
            $table->string("total");
            $table->string("qty");
            $table->unsignedBigInteger('Customerid');
            $table->unsignedBigInteger('Productid');
            $table->foreign('Customerid')->references('id')->on('registermodels')->onUpdate('cascade')->OnDelete('cascade');
            $table->foreign('Productid')->references('id')->on('productmodels')->onUpdate('cascade')->OnDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartmodels');
    }
}
