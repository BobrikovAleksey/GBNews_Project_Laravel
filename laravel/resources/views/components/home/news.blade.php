<div class="main-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($news as $item)
                        <div class="col-md-4">
                            <div class="mn-img">
                                <img src="{{ asset('img/news-350x223-' . random_int(1, 5) . '.jpg') }}" alt="cover" />

                                <div class="mn-title">
                                    <a class="small-slide" href="">{{ $item->title }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mn-list">
                    <h2>Читать больше</h2>

                    <ul>
                        @foreach ($moreNews as $news)
                            <li><a class="hidden-text" href="">{{ $news->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
