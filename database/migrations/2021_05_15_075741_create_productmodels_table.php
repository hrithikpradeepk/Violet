<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmodels', function (Blueprint $table) {
            $table->id("id");
            $table->string("Productname");
            $table->string("Description");
            $table->string("Productimage");
            $table->string("price");
            $table->unsignedBigInteger('categoryid');
            $table->unsignedBigInteger('brandid');
            $table->foreign('categoryid')->references('id')->on('categorymodels')->onUpdate('cascade')->OnDelete('cascade');
            $table->foreign('brandid')->references('id')->on('brandmodels')->onUpdate('cascade')->OnDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productmodels');
    }
}











