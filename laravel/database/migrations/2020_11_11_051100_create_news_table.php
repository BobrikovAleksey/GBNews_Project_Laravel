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
            $table->string('cover', 256)->nullable(true)->comment('Ссылка на обложку');
            $table->text('body')->comment('Содержание');
            $table->timestamps();

            $table->index('slug', 'news_slug_ndx');
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
