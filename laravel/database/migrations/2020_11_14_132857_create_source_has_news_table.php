<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceHasNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_has_news', function (Blueprint $table) {
            $table->unsignedBigInteger('source_id')->nullable(false);
            $table->unsignedBigInteger('news_id')->nullable(false);

            $table->primary(['source_id', 'news_id'], 'pk_source_has_news');
            $table->index(['news_id', 'source_id'], 'news_source_ndx');
            $table->foreign('source_id', 'fk_sources_has_news__source_id')
                ->references('id')->on('sources');
            $table->foreign('news_id', 'fk_sources_has_news__news_id')
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
        Schema::table('source_has_news', function (Blueprint $table) {
            $table->dropForeign('fk_sources_has_news__news_id');
            $table->dropForeign('fk_sources_has_news__source_id');
        });

        Schema::dropIfExists('source_has_news');
    }
}
