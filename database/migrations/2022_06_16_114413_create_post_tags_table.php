<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->index('post_tag_post_idx');
            $table->unsignedBigInteger('tag_id')->index('post_tag_tag_idx');

            $table->foreign('post_id', 'post_tag_post_fk')->references('id')->on('posts')->onDelete('cascade');;
            $table->foreign('tag_id', 'post_tag_tag_fk')->references('id')->on('tags')->onDelete('cascade');;

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
        Schema::dropIfExists('post_tags');
    }
}
