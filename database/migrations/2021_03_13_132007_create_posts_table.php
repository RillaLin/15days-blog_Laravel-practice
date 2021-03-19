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
            $table->bigIncrements('id');
            //$table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //刪使用者時順便把他的文章都刪除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts',function(Blueprint $table){ //把table叫進來
            $table->dropForeign(['user_id']);            //把FK丟掉
        });

        Schema::dropIfExists('posts');
    }
}
