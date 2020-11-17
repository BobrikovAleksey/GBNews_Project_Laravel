<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tb-contact">
                    <p><i class="fas fa-envelope"></i>{{ $email }}</p>

                    <p><i class="fas fa-phone-alt"></i>{{ $phone }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="tb-menu">
                    @foreach ($menu as $item)
                        <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
