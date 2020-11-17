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

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(rand(8, 16));

            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'body' => $faker->realText(rand(128, 256)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
