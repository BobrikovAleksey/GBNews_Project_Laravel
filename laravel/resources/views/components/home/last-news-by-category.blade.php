<div class="row cn-slider">
    @foreach ($news as $item)
        <div class="col-md-6">
            <div class="cn-img">
                <img src="{{ asset('img/news-350x223-' . random_int(1, 5) . '.jpg') }}" alt="cover"/>

                <div class="cn-title">
                    <a class="small-slide" href="#">{{ $item->title }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
