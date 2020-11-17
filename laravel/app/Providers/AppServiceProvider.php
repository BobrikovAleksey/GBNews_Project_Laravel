<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use App\View\Components\{BottomBar, Brand, Breadcrumbs, Footer, FooterBottom, Menu, TopBar};
use App\View\Components\Home\{LastNewsByCategory, News, PanelWithNews, TopNews};
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // main layout
        Blade::component(BottomBar::class, 'main-bottom-bar');
        Blade::component(Brand::class, 'main-brand');
        Blade::component(Breadcrumbs::class, 'main-breadcrumbs');
        Blade::component(Footer::class, 'main-footer');
        Blade::component(FooterBottom::class, 'main-footer-bottom');
        Blade::component(Menu::class, 'main-menu');
        Blade::component(TopBar::class, 'main-top-bar');

        // home
        Blade::component(LastNewsByCategory::class, 'home-last-news-by-category');
        Blade::component(News::class, 'home-news');
        Blade::component(PanelWithNews::class, 'home-panel-with-news');
        Blade::component(TopNews::class, 'home-top-news');
    }
}
