@extends('layouts.main')

@section('content')

<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <x-news-news-list :category="$category" :news="$news"></x-news-news-list>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        @isset ($category)
                            <h2 class="sw-title">В категории</h2>
                        @endisset

                        <x-news-panel-with-news :tabs="$featuredTabs"></x-news-panel-with-news>
                    </div>

                    <x-main-sidebar-advertising></x-main-sidebar-advertising>

                    <x-news-category-links :categories="$categories"></x-news-category-links>

                    <x-main-sidebar-advertising></x-main-sidebar-advertising>

                    <x-news-tags-cloud></x-news-tags-cloud>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
