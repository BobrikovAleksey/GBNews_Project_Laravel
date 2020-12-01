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

    <h2>Добавление источника новостей</h2>

    <form class="needs-validation mt-lg-4" action="{{ route('admin.source.store')  }}" method="POST" novalidate>
        @csrf

        @php
            $category_id = old('category_id') ?? "1";
        @endphp

        <div class="form-group">
            <label for="category_id">Категория новости</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id === $category_id) selected @endif>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input class="form-control" type="text" id="name" name="name" maxlength="128" required
                   placeholder="Введите наименование источника новостей" value="{{ old('name') }}"/>
            <div class="invalid-feedback">Пожалуйста, введите наименование источника новостей</div>
        </div>

        <div class="form-group">
            <label for="link">Ссылка на RSS-канал</label>
            <input class="form-control" type="text" id="link" name="link" maxlength="256" required
                   placeholder="Вставьте ссылку на RSS-канал" value="{{ old('link') }}"/>
            <div class="invalid-feedback">Пожалуйста, вставьте ссылку на RSS-канал</div>
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
