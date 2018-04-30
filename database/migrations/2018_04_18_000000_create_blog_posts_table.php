<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blog_posts')) {
            Schema::create('blog_posts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('author_id');
                $table->integer('category_id')->nullable();
                $table->string('title');
                $table->string('seo_title')->nullable();
                $table->text('excerpt');
                $table->text('body');
                $table->string('image')->nullable();
                $table->string('slug')->unique();
                $table->text('meta_description');
                $table->text('meta_keywords');
                $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
                $table->boolean('featured')->default(0);
                $table->timestamps();
                $table->text('tags')->nullable()->default(null);
                $table->timestamp('published_date')->nullable()->default(null)->useCurrent = true;
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_posts');
    }
}
