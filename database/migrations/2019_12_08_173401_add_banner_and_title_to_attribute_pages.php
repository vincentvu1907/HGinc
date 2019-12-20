<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerAndTitleToAttributePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attribute_pages', function (Blueprint $table) {
            $table->string("banner");
            $table->string("quote");
            $table->string("url");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribute_pages', function(Blueprint $table) {
            $table->dropColumn("banner");
            $table->dropColumn("quote");
            $table->dropColumn("url");
        });
    }
}
