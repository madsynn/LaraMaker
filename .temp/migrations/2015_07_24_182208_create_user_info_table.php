<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfo', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->primary();
            $table->string('photo')->nullable();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();

            $table->text('about_me')->nullable();
            $table->string('website')->nullable();
            $table->string('company')->nullable();
            $table->string('gender')->nullable();

            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('work')->nullable();
            $table->string('other')->nullable();

            $table->boolean('is_published')->default('0');
            $table->boolean('is_active')->default('0');

            $table->timestamp('dob')->nullable();


            $table->string('skypeid')->nullable();
            $table->string('githubid')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('facebook_username')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linked_in_url')->nullable();
            $table->string('google_plus_url')->nullable();

            $table->string('slug')->nullable();
            $table->string('display_name')->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userinfo');
    }
}
