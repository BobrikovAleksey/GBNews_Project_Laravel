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

            $table->softDeletes();

            $table->index(['slug', 'id'], 'categories_slug_id_ndx');
        });

        DB::table('categories')->insertOrIgnore([
            [
                'title' => 'Другие категории',
                'slug' => Str::slug('Другие категории'),
                'description' => '',
            ], [
                'title' => 'Россия',
                'slug' => Str::slug('Россия'),
                'description' => '',
            ], [
                'title' => 'В мире',
                'slug' => Str::slug('В мире'),
                'description' => '',
            ], [
                'title' => 'Местные новости',
                'slug' => Str::slug('Местные новости'),
                'description' => '',
            ], [
                'title' => 'Бизнес',
                'slug' => Str::slug('Бизнес'),
                'description' => '',
            ], [
                'title' => 'Наука и техника',
                'slug' => Str::slug('Наука и техника'),
                'description' => '',
            ], [
                'title' => 'Развлечения',
                'slug' => Str::slug('Развлечения'),
                'description' => '',
            ], [
                'title' => 'Спорт',
                'slug' => Str::slug('Спорт'),
                'description' => '',
            ], [
                'title' => 'Здоровье',
                'slug' => Str::slug('Здоровье'),
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
