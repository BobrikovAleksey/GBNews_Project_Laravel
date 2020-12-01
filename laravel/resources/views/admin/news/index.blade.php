@extends('layouts.main')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @elseif (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h2 class="p-0 m-0">Список новостей</h2>

        <a class="btn" href="{{ route('admin.news.create') }}">Добавить новость</a>
    </div>

    <hr class="mb-lg-4"/>

    <div class="container col-lg-10">
        @forelse ($newsList as $news)
            <div class="cat-news d-flex justify-content-between align-items-center">
                <div class="cn-img col-lg-w">
                    @isset ($news->cover)
                        <img src="{{ asset($news->cover) }}" alt="cover" />
                    @endisset
                </div>

                <div class="col-lg-8 pt-0 pb-0">
                    <a href="{{ route('admin.news.edit', $news) }}"><b>{{ $news->title }}</b></a>

                    <p class="mt-3 mb-0">
                        @isset ($news->author )
                            Автор: {{ $news->author }} /
                        @endisset
                        {{ date('d.m.Y H:i', strtotime($news->date)) }}
                    </p>
                </div>

                <form class="col-lg-2 d-flex justify-content-center" method="POST"
                      action="{{ route('admin.news.destroy', ['news' => $news])  }}">
                    @method('DELETE')
                    @csrf

                    <button class="btn" type="submit">Удалить</button>
                </form>
            </div>

            @if (!$loop->last)
                <hr/>
            @endif

        @empty
            <h3>Нет новостей</h3>
        @endforelse
    </div>

    <hr class="mt-lg-4"/>

    <div class="container col-lg-10">
        {{ $newsList->links() }}
    </div>

@endsection
