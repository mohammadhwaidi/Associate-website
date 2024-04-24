<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::create('internship_enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('internship_id');
            $table->unsignedInteger('user_id');
            $table->date('enrollment_date');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->text('education');
            $table->string('cv')->nullable();
            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internship_enrollments');
    }
}
