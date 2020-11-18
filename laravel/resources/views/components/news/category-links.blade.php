<div class="sidebar-widget">
    <h2 class="sw-title">Категории новостей</h2>

    <div class="category">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('News.Category', $category->slug) }}">{{ $category->title }}</a>

                    <span>({{ $category->news_count }})</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
