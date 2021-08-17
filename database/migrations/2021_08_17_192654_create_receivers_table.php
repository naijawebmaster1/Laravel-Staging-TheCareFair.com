<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->rememberToken('api_token');
            $table->string('name');
            $table->string('email');
            $table->string('email_verified')->default('false');
            $table->string('phone');
            $table->string('zip_code');
            $table->string('profile_photo_url')->nullable();
            $table->timestamp('date_joined');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivers');
    }
}
