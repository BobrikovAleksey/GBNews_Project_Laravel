<div class="sn-related">
    <h2>Похожие новости</h2>

    <div class="row sn-slider">
        @foreach($news as $item)
            <div class="col-md-4">
                <div class="sn-img">
                    <img src="{{ asset('img/news-350x223-' . random_int(1, 5) . '.jpg') }}" alt="cover"/>

                    <div class="sn-title">
                        <a class="small-slide" href="{{ route('News.Show', $item->slug) }}">{{ $item->title }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
