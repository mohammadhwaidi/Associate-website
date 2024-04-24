<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::create('event_enrollments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('user_id');
            $table->date('enrollment_date');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_enrollments');
    }
}
