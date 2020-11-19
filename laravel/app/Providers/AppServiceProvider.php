<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use App\View\Components\{BottomBar,
                         Brand,
                         Breadcrumbs,
                         Footer,
                         FooterBottom,
                         Menu,
                         SidebarAdvertising,
                         TopBar};
use App\View\Components\Contact\{Form, Info};
use Illuminate\Pagination\Paginator;
use App\View\Components\Home\{LastNewsByCategory, News, PanelWithNews, TopNews};
use App\View\Components\News\{CategoryLinks,
                              News as SingleNews,
                              NewsList,
                              PanelWithNews as SinglePanelWithNews,
                              RelatedNews,
                              TagsCloud};
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
        Paginator::useBootstrap();

        // main layout
        Blade::component(BottomBar::class, 'main-bottom-bar');
        Blade::component(Brand::class, 'main-brand');
        Blade::component(Breadcrumbs::class, 'main-breadcrumbs');
        Blade::component(Footer::class, 'main-footer');
        Blade::component(FooterBottom::class, 'main-footer-bottom');
        Blade::component(Menu::class, 'main-menu');
        Blade::component(SidebarAdvertising::class, 'main-sidebar-advertising');
        Blade::component(TopBar::class, 'main-top-bar');

        // contact
        Blade::component(Form::class, 'contact-form');
        Blade::component(Info::class, 'contact-info');

        // home
        Blade::component(LastNewsByCategory::class, 'home-last-news-by-category');
        Blade::component(News::class, 'home-news');
        Blade::component(PanelWithNews::class, 'home-panel-with-news');
        Blade::component(TopNews::class, 'home-top-news');

        // news
        Blade::component(CategoryLinks::class, 'news-category-links');
        Blade::component(SingleNews::class, 'news-news');
        Blade::component(NewsList::class, 'news-news-list');
        Blade::component(SinglePanelWithNews::class, 'news-panel-with-news');
        Blade::component(RelatedNews::class, 'news-related-news');
        Blade::component(TagsCloud::class, 'news-tags-cloud');
    }
}
