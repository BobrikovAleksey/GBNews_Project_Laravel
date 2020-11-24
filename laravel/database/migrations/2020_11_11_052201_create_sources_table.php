<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->string('name', 128)->unique()->nullable(false);
            $table->string('link', 256)->nullable(false);

            $table->foreign('category_id', 'fk_sources_has_news__category_id')
                ->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::table('sources')->insertOrIgnore([
            /* Яндекс: Категории */
            [
                'category_id' => 101,
                'name' => 'Яндекс | Авто',
                'link' => 'https://news.yandex.ru/auto.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Автоспорт',
                'link' => 'https://news.yandex.ru/auto_racing.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Армия и окружение',
                'link' => 'https://news.yandex.ru/army.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Баскетбол',
                'link' => 'https://news.yandex.ru/basketball.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Биатлон',
                'link' => 'https://news.yandex.ru/biathlon.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | В мире',
                'link' => 'https://news.yandex.ru/world.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Волейбол',
                'link' => 'https://news.yandex.ru/volleyball.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Гаджеты',
                'link' => 'https://news.yandex.ru/gadgets.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Главное',
                'link' => 'https://news.yandex.ru/index.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Единоборства',
                'link' => 'https://news.yandex.ru/martial_arts.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | ЖКХ',
                'link' => 'https://news.yandex.ru/communal.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Здоровье',
                'link' => 'https://news.yandex.ru/health.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Игры',
                'link' => 'https://news.yandex.ru/games.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Интернет',
                'link' => 'https://news.yandex.ru/internet.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Киберспорт',
                'link' => 'https://news.yandex.ru/cyber_sport.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Кино',
                'link' => 'https://news.yandex.ru/movies.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Коронавирус',
                'link' => 'https://news.yandex.ru/koronavirus.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Космос',
                'link' => 'https://news.yandex.ru/cosmos.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Культура',
                'link' => 'https://news.yandex.ru/culture.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Лига чемпионов',
                'link' => 'https://news.yandex.ru/championsleague.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Музыка',
                'link' => 'https://news.yandex.ru/music.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | НХЛ',
                'link' => 'https://news.yandex.ru/nhl.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Наука',
                'link' => 'https://news.yandex.ru/science.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Недвижимость',
                'link' => 'https://news.yandex.ru/realty.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Общество',
                'link' => 'https://news.yandex.ru/society.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Политика',
                'link' => 'https://news.yandex.ru/politics.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Происшествия',
                'link' => 'https://news.yandex.ru/incident.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Путешествия',
                'link' => 'https://news.yandex.ru/travels.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | РПЛ',
                'link' => 'https://news.yandex.ru/rpl.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Религия',
                'link' => 'https://news.yandex.ru/religion.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Спорт',
                'link' => 'https://news.yandex.ru/sport.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Театры',
                'link' => 'https://news.yandex.ru/theaters.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Теннис',
                'link' => 'https://news.yandex.ru/tennis.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Технологии',
                'link' => 'https://news.yandex.ru/computers.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Транспорт',
                'link' => 'https://news.yandex.ru/vehicle.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Фигурное катание',
                'link' => 'https://news.yandex.ru/figure_skating.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Финансы',
                'link' => 'https://news.yandex.ru/finances.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Футбол',
                'link' => 'https://news.yandex.ru/football.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Хоккей',
                'link' => 'https://news.yandex.ru/hockey.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Экология',
                'link' => 'https://news.yandex.ru/ecology.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Экономика',
                'link' => 'https://news.yandex.ru/business.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Энергетика',
                'link' => 'https://news.yandex.ru/energy.rss',
            ],
            /* Яндекс: Регионы */
            [
                'category_id' => 101,
                'name' => 'Яндекс | Санкт-Петербург',
                'link' => 'https://news.yandex.ru/Saint_Petersburg/index.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Вологда',
                'link' => 'https://news.yandex.ru/Vologda/index.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Москва',
                'link' => 'https://news.yandex.ru/Moscow/index.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Москва и область',
                'link' => 'https://news.yandex.ru/Moscow_and_Moscow_Oblast/index.rss',
            ], [
                'category_id' => 101,
                'name' => 'Яндекс | Санкт-Петербург и область',
                'link' => 'https://news.yandex.ru/Saint-Petersburg_and_Leningrad_Oblast/index.rss',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sources', function (Blueprint $table) {
            $table->dropForeign('fk_sources_has_news__category_id');
        });

        Schema::dropIfExists('sources');
    }
}
