<div class="sn-related">
    <h2>Похожие новости</h2>

    <div class="row sn-slider">
        @foreach($news as $item)
            <div class="col-md-4">
                <div class="sn-img">
                    <img src="{{ asset($item->cover) }}" alt="cover"/>

                    <div class="sn-title">
                        <a class="small-slide" href="{{ route('News.Show', $item->slug) }}">{{ $item->title }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
