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
            $table->string('title_eng', 224)->unique()->nullable(false)->comment('Заголовок');
            $table->timestamps();

            $table->index('slug', 'categories_slug_ndx');
        });

        DB::table('categories')->insertOrIgnore([
            [ 'title' => 'Россия', 'slug' => Str::slug('Россия'), 'title_eng' => 'Russia' ],
            [ 'title' => 'В мире', 'slug' => Str::slug('В мире'), 'title_eng' => 'World' ],
            [ 'title' => 'Местные новости', 'slug' => Str::slug('Местные новости'), 'title_eng' => 'Local' ],
            [ 'title' => 'Бизнес', 'slug' => Str::slug('Бизнес'), 'title_eng' => 'Business' ],
            [ 'title' => 'Наука и техника', 'slug' => Str::slug('Наука и техника'), 'title_eng' => 'Technology' ],
            [ 'title' => 'Развлечения', 'slug' => Str::slug('Развлечения'), 'title_eng' => 'Entertainment' ],
            [ 'title' => 'Спорт', 'slug' => Str::slug('Спорт'), 'title_eng' => 'Sport' ],
            [ 'title' => 'Здоровье', 'slug' => Str::slug('Здоровье'), 'title_eng' => 'Health' ],
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
