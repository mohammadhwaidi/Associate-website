<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('DonationID');
            $table->integer('Amount');
            $table->date('DonationDate');
            $table->unsignedInteger('UserID');

            $table->foreign('UserID')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
