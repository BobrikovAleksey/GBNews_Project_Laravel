<div class="sn-container">
    <div class="sn-img">
        <img src="{{ asset('img/news-825x525.jpg') }}" alt="cover"/>
    </div>
    <div class="sn-content">
        <h1 class="sn-title">{{ $news->title }}</h1>

        {!! $news->body !!}
    </div>
</div>
