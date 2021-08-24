<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("public_id") -> nullable();
            $table->bigInteger("user_post_id");
            $table->string("user_post_name");
            $table->string("user_post_caption");
            $table->string("user_post_image") -> nullable();
            $table->string("user_post_profile_image");
            $table->string("user_post_date")->nullable();
            $table->integer("is_user_post_delete");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}