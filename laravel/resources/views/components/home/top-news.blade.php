<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <div class="row tn-slider">
                    @for ($i = 1; $i < 4; $i++)
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('img/news-450x350-' . random_int(1, 2) .'.jpg') }}" alt="cover"/>

                                <div class="tn-title">
                                    <a class="medium-slide" href="{{ route('news.show', $news[$i-1]->slug) }}">
                                        {{ $news[$i-1]->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="col-md-6 tn-right">
                <div class="row">
                    @for ($i = 1; $i < 5; $i++)
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset($news[$i+2]->cover) }}" alt="cover"/>

                                <div class="tn-title">
                                    <a class="small-slide" href="{{ route('news.show', $news[$i+2]->slug) }}">
                                        {{ $news[$i+2]->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
