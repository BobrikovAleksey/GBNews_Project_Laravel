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
            $table->string('author', 128)->nullable()->default('Неизвестен')->comment('Автор');
            $table->string('source', 128)->nullable()->default('Отсутствует')->comment('Источник');
            $table->text('body')->nullable(false)->comment('Содержание');
            $table->timestamp('date')->nullable()->comment('Дата и время публикации');
            $table->unsignedBigInteger('views')->default(1)->comment('Количество просмотров');
            $table->unsignedBigInteger('rating')->default(0)->comment('Рейтинг новости');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['slug', 'date'], 'news_slug_date_ndx');
            $table->index(['author', 'date'], 'news_author_date_ndx');
            $table->index(['source', 'date'], 'news_source_date_ndx');
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
