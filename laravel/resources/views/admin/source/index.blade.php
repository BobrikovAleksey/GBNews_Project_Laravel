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
        <h2 class="p-0 m-0">Список источников новостей</h2>

        <a class="btn" href="{{ route('admin.source.create') }}">Добавить источник новостей</a>
    </div>

    <hr class="mb-lg-4"/>

    <div class="container col-lg-10">
        @forelse ($sourceList as $source)
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-lg-8">
                    <a href="{{ route('admin.source.edit', $source) }}"><b>{{ $source->name }}</b></a>
                </div>

                <form class="col-lg-4 d-flex justify-content-center" method="POST"
                      action="{{ route('admin.source.destroy', ['source' => $source])  }}">
                    @method('DELETE')
                    @csrf

                    <button class="btn" type="submit">Удалить</button>
                </form>
            </div>

            @if (!$loop->last)
                <hr/>
            @endif

        @empty
            <h3>Нет источников новостей</h3>
        @endforelse
    </div>

    <hr class="mt-lg-4"/>

    <div class="container col-lg-10">
        {{ $sourceList->links() }}
    </div>

@endsection
