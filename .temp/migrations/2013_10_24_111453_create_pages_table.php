<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_published')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->boolean('has_product_link')->default(false);
            $table->boolean('product_link_nofollow')->default(false);
            $table->string('layout');
            $table->string('title',65);
            $table->string('subtitle',130)->nullable();
            $table->text('excerpt');
            $table->text('content');
            $table->string('slug')->nullable();
            $table->string('meta_title',65)->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description',160);
            $table->string('fb_title',80)->nullable();
            $table->string('gp_title',80)->nullable();
            $table->string('tw_title',80)->nullable();
            $table->string('link_to_product_title')->nullable();
            $table->string('link_to_product')->nullable();

            $table->string('lang', 20);
            $table->integer('author_id')->unsigned()->nullable();
            $table->integer('section_id')->unsigned()->nullable();
            $table->timestamp('published_at');
            $table->timestamp('added_on');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
