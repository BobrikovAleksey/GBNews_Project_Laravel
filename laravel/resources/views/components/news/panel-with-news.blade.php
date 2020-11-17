<div class="sidebar-widget">
    <h2 class="sw-title">В категории</h2>

    <div class="tab-news">
        <ul class="nav nav-pills nav-justified">
            @foreach ($tabs as $tab)
                <li class="nav-item">
                    <a class="nav-link sidebar-panel__tabs @if ($loop->first) {{ 'active' }} @endif" data-toggle="pill"
                       href="#{{ $tab['link'] }}">
                        {{ $tab['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach ($tabs as $tab)
                <div id="{{ $tab['link'] }}" class="container tab-pane @if ($loop->first) {{ 'active' }} @endif">
                    @foreach ($tab['news'] as $news)
                        <div class="tn-news">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-350x223-' . random_int(1, 5). '.jpg') }}" alt="cover" />
                            </div>

                            <div class="tn-title sidebar-panel__news">
                                <a href="{{ route('News.Show', $news->slug) }}">{{ $news->title }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
