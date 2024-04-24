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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('TestimonialID');
            $table->text('Content');
            $table->string('TestimonialImage');
            $table->date('PublishDate');
            $table->unsignedInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
