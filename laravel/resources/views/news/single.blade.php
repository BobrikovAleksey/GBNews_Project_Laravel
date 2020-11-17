@extends('layouts.main')

@section('content')

<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <x-news-news :news="$news"></x-news-news>

                <x-news-related-news :news="$relatedNews"></x-news-related-news>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <x-news-panel-with-news :tabs="$featuredTabs"></x-news-panel-with-news>

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
