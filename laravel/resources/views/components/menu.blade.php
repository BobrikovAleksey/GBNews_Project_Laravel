<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="{{ route('home') }}" class="navbar-brand">Меню</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link
                       @if ($activeMenuItem[route('home')]) active @endif">Главная страница</a>

                    <div class="nav-item dropdown">
                        <a href="" data-toggle="dropdown" class="nav-link dropdown-toggle
                           @if ($activeMenuItem[route('news.index')]) active @endif">Новости</a>

                        <div class="dropdown-menu">
                            @foreach ($newsMenu as $item)
                                @empty($item)
                                    <hr/>

                                @else
                                    <a href="{{ $item['link'] }}" class="dropdown-item">
                                        {{ $item['title'] }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <a href="#" class="nav-item nav-link">О нас</a>

                    <a href="{{ route('feedback.index') }}" class="nav-item nav-link
                       @if ($activeMenuItem[route('feedback.index')]) active @endif">Связаться с нами</a>

                    <div class="nav-item dropdown">
                        <a href="" data-toggle="dropdown" class="nav-link dropdown-toggle
                            @if ($activeMenuItem[route('admin.category.index')]
                              || $activeMenuItem[route('admin.news.index')]
                              || $activeMenuItem[route('admin.source.index')]
                              || $activeMenuItem[route('admin.feedback.index')])
                                active
                            @endif">Панель управления</a>

                        <div class="dropdown-menu">
                            <a href="{{ route('admin.news.index') }}" class="dropdown-item">Новости</a>
                            <hr/>

                            <a href="{{ route('admin.category.index') }}" class="dropdown-item">Категории новостей</a>

                            <a href="{{ route('admin.source.index') }}" class="dropdown-item">Источники новостей</a>
                            <hr/>

                            <a href="{{ route('admin.feedback.index') }}" class="dropdown-item">Обратная связь</a>
                        </div>
                    </div>
                </div>

                <div class="social ml-auto">
                    <a href="https://twitter.com/">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a href="https://www.facebook.com/">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="https://www.linkedin.com/">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a href="https://www.instagram.com/">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://www.youtube.com/">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
