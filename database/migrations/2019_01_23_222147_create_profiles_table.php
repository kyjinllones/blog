<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            //$table->string('name');
            $table->string('address',255);
        
            $table->date('birthdate');
            //$table->string('secondary_email_address');
            //$table->string('phone_number');
            //$table->string('display_picture');
            //$table->string('marital_status');
            //$table->date('birthdate');
            //$table->string('gender');

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}