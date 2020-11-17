<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryHasNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_has_news', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->unsignedBigInteger('news_id')->nullable(false);

            $table->primary(['category_id', 'news_id'], 'pk_category_has_news');
            $table->index(['news_id', 'category_id'], 'news_category_ndx');
            $table->foreign('category_id', 'fk_categories_has_news__category_id')
                ->references('id')->on('categories');
            $table->foreign('news_id', 'fk_categories_has_news__news_id')
                ->references('id')->on('news');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_has_news', function (Blueprint $table) {
            $table->dropForeign('fk_categories_has_news__news_id');
            $table->dropForeign('fk_categories_has_news__category_id');
        });

        Schema::dropIfExists('category_has_news');
    }
}
