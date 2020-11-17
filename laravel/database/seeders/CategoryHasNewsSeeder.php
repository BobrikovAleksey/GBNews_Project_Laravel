<?php

namespace Database\Seeders;

use App\Models\{ Category, News };
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_has_news')->insert($this->getData());
    }

    /**
     * Возвращает массив с данными
     *
     * @return array
     */
    public function getData(): array
    {
        $news = News::query()->select('id')->get();
        $category = Category::query()->select('id')->get()->toArray();

        $data = [];
        for ($i = 0; $i < count($news); $i++) {
            $data[] = [
                'news_id' => $news[$i]->id,
                'category_id' => $category[array_rand($category)]['id'],
            ];
        }

        return $data;
    }
}
