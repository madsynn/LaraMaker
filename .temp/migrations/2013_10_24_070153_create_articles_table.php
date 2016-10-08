<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table)  {
            $table->increments('id');
            $table->integer('author_id')->unsigned()->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_draft')->default(0);
            $table->boolean('has_product_link')->default(0);
            $table->boolean('product_link_nofollow')->default(0);
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('excerpt');
            $table->text('content');
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('fb_title')->nullable();
            $table->string('gp_title')->nullable();
            $table->string('tw_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description');
            $table->string('path')->nullable();
            $table->string('file_name')->nullable();
            $table->unsignedInteger('file_size')->unsigned()->nullable();

            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');

            $table->string('link_to_product_title')->nullable();
            $table->string('link_to_product')->nullable();
            $table->string('lang')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->string('name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('articles');
        Schema::drop('blog_categories');
    }
}
