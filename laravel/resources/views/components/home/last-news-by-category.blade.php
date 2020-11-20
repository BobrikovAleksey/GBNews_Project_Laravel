<div class="row cn-slider">
    @foreach ($news as $item)
        <div class="col-md-6">
            <div class="cn-img">
                <img src="{{ asset($item->cover) }}" alt="cover"/>

                <div class="cn-title">
                    <a class="small-slide" href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
