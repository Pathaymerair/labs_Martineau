<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // if (!Schema::hasTable('comments')){
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->string('msg');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('random_id')->nullable();
            $table->unsignedInteger('post_id')->unsigned();
            $table->unsignedInteger('state_id')->default(1);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('random_id')->references('id')->on('randoms');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('state_id')->references('id')->on('states');
            $table->timestamps();
        });
    // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
