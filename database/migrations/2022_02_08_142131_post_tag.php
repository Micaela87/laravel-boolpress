<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {

            $table -> id();

            $table -> foreignId('post_id') -> constrained('posts');
            $table -> foreignId('tag_id') -> constrained('tags');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::create('post_tag', function (Blueprint $table) {

        //     // $table->dropForeign('posts_user_id_foreign');

        //     $table -> dropForeign('post_tag_post_id_foreign');
        //     $table -> dropForeign('post_tag_post_id_foreign');

        // });
    }
}
