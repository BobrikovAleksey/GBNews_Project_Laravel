<div class="tab-news">
    <div class="container tab-pane">
        <h1 class="sn-title">
            @isset ($category)
                {{ $category->title }}
            @endisset

            @empty ($category)
                Все новости
            @endempty
        </h1>

        <hr/>

        @foreach ($news as $item)
            <div class="tn-news card-news flex justify-content-between mb-4">
                <div class="tn-title w-100 flex-column pt-0 pb-0">
                    <a href="{{ route('news.show', $item->slug) }}"><b>{{ $item->title }}</b></a>

                    <p class="mt-3 mb-0">{{ $item->author }}, {{ date('d.m.Y H:i', strtotime($item->date)) }}</p>
                </div>

                <div class="tn-img">
                    <img src="{{ asset($item->cover) }}" alt="cover" />
                </div>
            </div>

            <hr/>
        @endforeach

        {{ $news->links() }}

    </div>
</div>
