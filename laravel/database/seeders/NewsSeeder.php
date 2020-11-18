<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    /**
     * Возвращает массив с данными
     *
     * @return array
     */
    public function getData(): array
    {
        $faker = Factory::create();

        $images = [
            asset('img/news-350x223-1.jpg'),
            asset('img/news-350x223-2.jpg'),
            asset('img/news-350x223-3.jpg'),
            asset('img/news-350x223-4.jpg'),
            asset('img/news-350x223-5.jpg'),
        ];

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $title = $faker->sentence(rand(8, 16));

            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'body' => $faker->realText(rand(256, 512)),
                'cover' => $images[$i % 5],
                'author' => $faker->sentence(rand(2, 3)),
                'date' => now(),
                'views' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
