<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {

            $table->increments('id');
            $table->string('question');
            $table->text('answer');
            $table->integer('order');
            $table->string('lang', 20);

            $table->string('thumbnail')->nullable();

            $table->unsignedInteger('answered_by')->nullable();
            $table->unsignedInteger('asked_by')->nullable();
            $table->boolean('is_published')->default(true);

            $table->timestamp('published_at');

            $table->enum('filter_class', ['pf-new','pf-qn','pf-mq','pf-hq','pf-hoop','pf-acc','pf-gen', 'pf-support', 'pf-help']);
            $table->string('datalayer')->nullable();
            $table->string('tracking')->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('faqs');
    }
}
