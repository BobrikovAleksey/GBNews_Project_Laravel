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

    <h2>Добавление категории</h2>

    <form class="needs-validation mt-lg-4" action="{{ route('admin.category.store')  }}" method="POST" novalidate>
        @csrf

        <div class="form-group">
            <label for="title">Название</label>
            <input class="form-control" type="text" id="title" name="title" maxlength="224" required
                   placeholder="Введите название категории" value="{{ old('title') }}"/>
            <div class="invalid-feedback">Пожалуйста, введите название категории</div>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="8"
                      placeholder="Введите описание категории"
                >{{ old('description') }}</textarea>
        </div>

        <div>
            <button class="btn" type="submit">Сохранить</button>
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
