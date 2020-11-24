<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            $table->string('title', 224)->unique()->nullable(false)->comment('Заголовок');
            $table->string('slug', 256)->nullable(false)->comment('Транслитерация заголовка');
            $table->string('description', 512)->nullable()->comment('Описание');

            $table->index(['slug', 'id'], 'categories_slug_id_ndx');
        });

        DB::table('categories')->insertOrIgnore([
            [
                'id' => 1,
                'title' => 'Россия',
                'slug' => Str::slug('Россия'),
                'description' => '',
            ], [
                'id' => 2,
                'title' => 'В мире',
                'slug' => Str::slug('В мире'),
                'description' => '',
            ], [
                'id' => 3,
                'title' => 'Местные новости',
                'slug' => Str::slug('Местные новости'),
                'description' => '',
            ], [
                'id' => 4,
                'title' => 'Бизнес',
                'slug' => Str::slug('Бизнес'),
                'description' => '',
            ], [
                'id' => 5,
                'title' => 'Наука и техника',
                'slug' => Str::slug('Наука и техника'),
                'description' => '',
            ], [
                'id' => 6,
                'title' => 'Развлечения',
                'slug' => Str::slug('Развлечения'),
                'description' => '',
            ], [
                'id' => 7,
                'title' => 'Спорт',
                'slug' => Str::slug('Спорт'),
                'description' => '',
            ], [
                'id' => 8,
                'title' => 'Здоровье',
                'slug' => Str::slug('Здоровье'),
                'description' => '',
            ], [
                'id' => 101,
                'title' => 'Другие категории',
                'slug' => Str::slug('Другие категории'),
                'description' => '',
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
        Schema::dropIfExists('categories');
    }
}
