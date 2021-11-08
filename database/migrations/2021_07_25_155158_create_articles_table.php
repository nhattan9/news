<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('summary')->comment('decription Meta Tag')->nullable();
            $table->string('keywords')->comment('keywords Meta Tag')->nullable();
            $table->integer('active')->default(0);
            $table->integer('breaking_news')->default(1);
            $table->integer('feature_news')->default(1);
            $table->integer('recommended_news')->default(1);
            $table->string('thumbnail');
            $table->text('content');
            $table->integer('views')->nullable();
            $table->integer('author_id');
            $table->integer('category_id');
            $table->integer('review_person_id')->nullable();
            $table->dateTime('review_time',0)->nullable();
            $table->integer('published')->nullable();
            $table->dateTime('published_time',0)->nullable();
            $table->integer('editor_id')->nullable();
            $table->integer('drafft')->nullable();
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
        Schema::dropIfExists('articles');
    }
}