<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->increments('ContactUsID');
            $table->string('Name', 50);
            $table->string('Email', 100);
            $table->string('PhoneNumber', 20)->nullable();
            $table->text('Message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}
