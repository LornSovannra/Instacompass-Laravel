<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("public_id") -> nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string("user_bio");
            $table->string("user_phone_number");
            $table->string("user_gender");
            $table->string("user_profile_image");
            $table->integer("user_post");
            $table->integer("user_follower");
            $table->integer("user_following");
            $table->boolean("is_user_active");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
