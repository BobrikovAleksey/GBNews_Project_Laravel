@extends('layouts.main')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2>Сообщения от пользователей</h2>

    <hr class="mb-lg-4"/>

    <div class="container col-lg-10">
        @forelse ($feedbackList as $feedback)
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-lg-3 d-flex justify-content-center">
                    <p class="mb-0">{{ $feedback->created_at->format('d.m.Y H:i') }}</p>
                </div>

                <div class="col-lg-9">
                    <a href="{{ route('admin.feedback.edit', $feedback) }}"><b>{{ $feedback->subject }}</b></a>
                </div>
            </div>

            @if (!$loop->last)
                <hr/>
            @endif

        @empty
            <h3>Нет сообщений</h3>
        @endforelse
    </div>

    <hr class="mt-lg-4"/>

    <div class="container col-lg-10">
        {{ $feedbackList->links() }}
    </div>

@endsection
