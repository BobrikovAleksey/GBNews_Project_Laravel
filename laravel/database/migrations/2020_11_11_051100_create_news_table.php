<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 224)->nullable(false)->comment('Заголовок');
            $table->string('slug', 256)->nullable(false)->comment('Транслитерация заголовка');
            $table->string('cover', 256)->nullable()->comment('Ссылка на обложку');
            $table->string('author', 128)->nullable()->comment('Автор');
            $table->string('source', 128)->nullable()->comment('Источник');
            $table->dateTime('date')->nullable(false)->comment('Дата и время публикации');
            $table->integer('views')->default(1)->comment('Количество просмотров');
            $table->text('body')->nullable()->comment('Содержание');
            $table->timestamps();

            $table->index('slug', 'news_slug_ndx');
            $table->index('author', 'news_author_ndx');
            $table->index('source', 'news_source_ndx');
            $table->index(['date', 'id'], 'news_date_id_ndx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
