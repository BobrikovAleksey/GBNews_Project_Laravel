<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="{{ route('Home') }}" class="navbar-brand">Меню</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    @foreach ($menu as $item)
                        @if (key_exists('submenu', $item))
                            <div class="nav-item dropdown">
                                <a href="{{ $item['link'] }}" class="nav-link dropdown-toggle
                                   @if ($item['active']) {{ 'active' }} @endif" data-toggle="dropdown">
                                    {{ $item['title'] }}
                                </a>

                                <div class="dropdown-menu">
                                    @foreach ($item['submenu'] as $subItem)
                                        @if (empty($subItem))
                                            <hr/>

                                        @else
                                            <a href="{{ $subItem['link'] }}" class="dropdown-item">
                                                {{ $subItem['title'] }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        @else
                            <a href="{{ $item['link'] }}" class="nav-item nav-link
                               @if ($item['active']) {{ 'active' }} @endif">
                                {{ $item['title'] }}
                            </a>
                        @endif

                    @endforeach
                </div>

                <div class="social ml-auto">
                    @foreach ($links as $link)
                        <a href="{{ $link['link'] }}">{!! $link['icon'] !!}</a>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
</div>
