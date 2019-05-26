<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablePoetryComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');
            // 用户id
            $table->integer('user_id')->default(0);
            // 用户昵称
            $table->string('user_nick', 50)->default('');
            // 用户图标
            $table->string('user_icon', 50)->default('');
            // 站点id
            $table->integer('site_id')->default(0);
            // 功能id
            $table->integer('func_id')->default(0);
            // 内容id
            $table->integer('target_id')->default(0);
            // 上行id
            $table->integer('up_id')->default(0);
            // 评论id
            $table->integer('down_count')->default(0);
            // 点赞id
            $table->integer('like_count')->default(0);
            // 踩数量id
            $table->integer('dislike_count')->default(0);
            // 举报数量
            $table->integer('tip_count')->default(0);
            // 内容id
            $table->string('content', 254)->default('');
            $table->timestamps();
            $table->softDeletes();

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
