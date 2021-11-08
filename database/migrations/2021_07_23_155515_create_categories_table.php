<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('slug',255);
            $table->text('descriptions',255)->comment('Mega Tag SEO')->nullable();
            $table->string('keywords',255)->comment('Mega Tag SEO')->nullable();
            $table->string('color')->nullable();
            $table->integer('parent_id');
            $table->integer('menu_order')->nullable();
            $table->integer('active')->default(0);
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
        Schema::dropIfExists('categories');
    }
}