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
        <h2 class="p-0 m-0">Список категорий</h2>

        <a class="btn" href="{{ route('admin.category.create') }}">Добавить категорию</a>
    </div>

    <hr class="mb-lg-4"/>

    <div class="container col-lg-10">
        @forelse ($categoryList as $category)
            @if ($category->id > 1)
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <a href="{{ route('admin.category.edit', $category) }}"><b>{{ $category->title }}</b></a>
                    </div>

                    <form class="col-lg-4 d-flex justify-content-center" method="POST"
                          action="{{ route('admin.category.destroy', ['category' => $category])  }}">
                        @method('DELETE')
                        @csrf

                        <button class="btn" type="submit">Удалить</button>
                    </form>
                </div>

            @else
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-lg-8">
                        <a><b>{{ $category->title }}</b></a>
                    </div>
                </div>
            @endif

            @if (!$loop->last)
                <hr/>
            @endif

        @empty
            <h3>Нет категорий новостей</h3>
        @endforelse
    </div>

    <hr class="mt-lg-4"/>

    <div class="container col-lg-10">
        {{ $categoryList->links() }}
    </div>

@endsection
