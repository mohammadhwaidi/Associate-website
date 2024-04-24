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
        Schema::create('slideshows', function (Blueprint $table) {
            $table->increments('SlideshowID');
            $table->text('Title');
            $table->string('SlideshowImage');
            $table->text('Caption');
            $table->unsignedInteger('AdminID');

            $table->foreign('AdminID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slideshows');
    }
};
