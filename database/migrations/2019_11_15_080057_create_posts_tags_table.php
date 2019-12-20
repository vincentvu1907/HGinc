<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
             $table->bigInteger("post_id")->unsigned();
            $table->bigInteger("tag_id")->unsigned();
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");
            $table->primary(["post_id","tag_id"]);
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
        Schema::dropIfExists('posts_tags');
    }
}
