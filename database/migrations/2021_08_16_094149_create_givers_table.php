<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('givers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->rememberToken('api_token');
            $table->string('name');
            $table->string('email');
            $table->string('email_verified')->default('true');
            $table->string('phone');
            $table->date('birthdate');
            $table->string('caption')->nullable();
            $table->string('bio')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code');
            $table->string('hourly_rate')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->json('rating')->nullable();
            $table->string('care_type')->nullable();
            $table->string('special_experience')->default("false");
            $table->string('education_experience')->default("false");
            $table->string('owns_car')->default("true");
            $table->string('availability')->nullable();
            $table->string('generally_available"')->default("false");
            $table->string('background_document_path')->nullable();
            $table->string('background_verified')->default("false");
            $table->string('ccna_document_url')->nullable();
            $table->string('ccna_verified')->default("false");
            $table->string('cpr_document_url')->nullable();
            $table->string('cpr_verified')->default("false");
            $table->string('covid_document_url')->nullable();
            $table->string('covid_verified')->default("false");
            $table->string('vehicle_document_url')->nullable();
            $table->string('vehicle_verified')->default("false");
            $table->string('resume_document_url')->nullable();
            $table->string('resume_verified')->default("false");
            $table->string('profile_photo_url');
            $table->timestamp('date_joined');
            $table->string('password');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('givers');
    }
}
