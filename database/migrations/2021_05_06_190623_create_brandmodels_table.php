<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brandmodels', function (Blueprint $table) {
            $table->id('id');
            $table->string("Brandname");
            $table->string("brandimage");
            $table->unsignedBigInteger('categoryid');
            $table->foreign('categoryid')->references('id')->on('categorymodels')->onUpdate('cascade')->OnDelete('cascade');
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
        Schema::dropIfExists('brandmodels');
    }
}
