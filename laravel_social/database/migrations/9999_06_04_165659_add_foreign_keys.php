<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table  -> foreign('user_id', 'userpost')
                    -> references('id')
                    -> on('users');
        });

        Schema::table('comments', function (Blueprint $table) {
            
            $table  -> foreign('post_id', 'commentpost')
                    -> references('id')
                    -> on('posts');

            $table  -> foreign('user_id', 'commentuser')
                    -> references('id')
                    -> on('users');
        });

        Schema::table('post_topic', function (Blueprint $table) {
        
            $table  -> foreign('post_id', 'posttopic')
                    -> references('id')
                    -> on('posts');
            
            $table  -> foreign('topic_id', 'topicpost')
                    -> references('id')
                    -> on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table  -> dropForeign('userpost');
        });

        Schema::table('comments', function (Blueprint $table) {
            
            $table  -> dropForeign('commentpost');
            $table  -> dropForeign('commentuser');
        });

        Schema::table('post_topic', function (Blueprint $table) {
            
            $table  -> dropForeign('posttopic');
            $table  -> dropForeign('topicpost');
        });
    }
}
