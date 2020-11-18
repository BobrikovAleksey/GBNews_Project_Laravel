<?php

namespace Tests\Feature;

use App\Models\{Category, News};
use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * @return void
     */
    public function testNewsPath()
    {
        $response = $this->get(route('News.Index'));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testNewsDontSeeLinkHash()
    {
        $response = $this->get(route('News.Index'));

        $response->assertDontSee('href="#"', false);
    }

    /**
     * @return void
     */
    public function testNewsShowPath()
    {
        $news = News::select('slug')->get()->toArray();
        $newsSlug = $news[array_rand($news)];

        $response = $this->get(route('News.Show', $newsSlug));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testNewsShowPathWithInvalidSlug()
    {
        $response = $this->get(route('News.Show', 'test'));

        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function testNewsShowDontSeeLinkHash()
    {
        $news = News::select('slug')->get()->toArray();
        $newsSlug = $news[array_rand($news)];

        $response = $this->get(route('News.Show', $newsSlug));

        $response->assertDontSee('href="#"', false);
    }

    /**
     * @return void
     */
    public function testNewsCategoryPath()
    {
        $categories = Category::select('slug')->get()->toArray();
        $categorySlug = $categories[array_rand($categories)];

        $response = $this->get(route('News.Category', $categorySlug));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testNewsCategoryPathWithInvalidSlug()
    {
        $response = $this->get(route('News.Category', 'test'));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testNewsCategoryDontSeeLinkHash()
    {
        $categories = Category::select('slug')->get()->toArray();
        $categorySlug = $categories[array_rand($categories)];

        $response = $this->get(route('News.Category', $categorySlug));

        $response->assertDontSee('href="#"', false);
    }
}
