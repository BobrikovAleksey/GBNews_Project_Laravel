@extends('layouts.main')

@section('content')

<x-home-top-news :news="$topNews"></x-home-top-news>

<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $categories[1]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[1]->id"></x-home-last-news-by-category>
            </div>

            <div class="col-md-6">
                <h2>{{ $categories[2]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[2]->id"></x-home-last-news-by-category>
            </div>
        </div>
    </div>
</div>

<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $categories[3]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[3]->id"></x-home-last-news-by-category>
            </div>

            <div class="col-md-6">
                <h2>{{ $categories[4]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[4]->id"></x-home-last-news-by-category>
            </div>
        </div>
    </div>
</div>

<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $categories[5]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[5]->id"></x-home-last-news-by-category>
            </div>

            <div class="col-md-6">
                <h2>{{ $categories[6]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[6]->id"></x-home-last-news-by-category>
            </div>
        </div>
    </div>
</div>

<div class="cat-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $categories[7]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[7]->id"></x-home-last-news-by-category>
            </div>

            <div class="col-md-6">
                <h2>{{ $categories[8]->title }}</h2>

                <x-home-last-news-by-category :category-id="$categories[8]->id"></x-home-last-news-by-category>
            </div>
        </div>
    </div>
</div>

<div class="tab-news">
    <div class="container">
        <div class="row">
            <x-home-panel-with-news :tabs="$featuredTabs"></x-home-panel-with-news>

            <x-home-panel-with-news :tabs="$mostTabs"></x-home-panel-with-news>
        </div>
    </div>
</div>

<x-home-news :news="$news" :moreNews="$moreNews"></x-home-news>

@endsection
