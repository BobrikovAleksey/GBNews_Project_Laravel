<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                    <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>

                @else
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['title'] }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
