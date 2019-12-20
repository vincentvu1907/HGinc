<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostsSpecials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_specials', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('special_id')->unsigned();
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");
            $table->foreign("special_id")->references("id")->on("specials")->onDelete("cascade");
            $table->primary(["post_id","special_id"]);
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
        Schema::dropIfExists('posts_specials');
    }
}
