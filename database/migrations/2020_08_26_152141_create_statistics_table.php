<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('link_id');
            $table->longText('ipaddress')->nullable();
            $table->longText('country')->nullable();
            $table->longText('city')->nullable();
            $table->longText('state')->nullable();
            $table->longText('continent')->nullable();
            $table->longText('lat')->nullable();
            $table->longText('log')->nullable();
            $table->longText('browser')->nullable();
            $table->longText('device')->nullable();
            $table->boolean('click');
            $table->timestamps();


            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
