@extends('layouts.main')

@section('content')

    @if (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2>Сообщение от {{ $feedback->name }}, {{ $feedback->created_at->format('d.m.Y H:i') }}</h2>

    <form class="needs-validation mt-lg-4" action="{{ route('admin.feedback.update', ['feedback' => $feedback])  }}"
          method="POST" novalidate>
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" readonly
                   value="{{ old('email') ?? $feedback->email }}" />
        </div>

        <div class="form-group">
            <label for="subject">Тема сообщения</label>
            <input class="form-control" type="text" id="subject" name="subject" readonly
                   placeholder="Введите название категории" value="{{ old('subject') ?? $feedback->subject }}" />
            <div class="invalid-feedback">Пожалуйста, введите название категории</div>
        </div>

        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea class="form-control" id="message" name="message" rows="8" readonly
            >{{ old('message') ?? $feedback->message }}</textarea>
        </div>

        <div class="form-group">
            <label for="notes">Заметки</label>
            <textarea class="form-control" id="notes" name="notes" rows="5" placeholder="Введите ваши заметки"
            >{{ old('notes') ?? $feedback->notes }}</textarea>
        </div>

        <div>
            <button class="btn" type="submit" name="_method" value="PUT">Закрыть обращение</button>

            <button class="btn" type="submit" name="_method" value="DELETE">Удалить</button>
        </div>
    </form>

@endsection

@push('scripts')

    <script>
        (function() {
            'use strict';

            window.addEventListener('load', function() {
                let forms = document.getElementsByClassName('needs-validation');
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

@endpush
