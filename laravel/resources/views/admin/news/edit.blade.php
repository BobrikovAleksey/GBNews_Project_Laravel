@extends('layouts.main')

@php
    /**
     * @noinspection PhpFullyQualifiedNameUsageInspection
     * @noinspection PhpUndefinedClassInspection
     * @var \App\Models\News $news
     */
    $category_id = old('category_id') ?? $news->categories->first()->id;
@endphp

@section('content')

    @if (session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2>Редактирование новости с #ID = {{ $news->id  }}</h2>

    <form class="needs-validation mt-lg-4" action="{{ route('admin.news.update', $news)  }}" method="POST" novalidate>
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="category_id">Категория новости</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $category_id) selected @endif>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="author">Автор</label>
                <input class="form-control" type="text" id="author" name="author" maxlength="128"
                       placeholder="Введите автора" value="{{ old('author') ?? $news->author }}" />
            </div>

            <div class="form-group col-md-6">
                <label for="source">Источник</label>
                <input class="form-control" type="text" id="source" name="source" maxlength="128"
                       placeholder="Введите источник" value="{{ old('source') ?? $news->source }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input class="form-control" type="text" id="title" name="title" maxlength="224"
                   placeholder="Введите заголовок новости" value="{{ old('title') ?? $news->title }}" required />
            <div class="invalid-feedback">Пожалуйста, введите заголовок новости</div>
        </div>

        <div class="form-group">
            <label for="cover">Ссылка на обложку</label>
            <input class="form-control" type="text" id="cover" name="cover" maxlength="256"
                   placeholder="Вставьте ссылку на обложку" value="{{ old('cover') ?? $news->cover }}" />
        </div>

        <div class="form-group">
            <label for="body">Содержание новости</label>
            <textarea class="form-control" id="body" name="body" rows="8" required
                      placeholder="Введите содержимое новости"
            >{{ old('body') ?? $news->body }}</textarea>
            <div class="invalid-feedback">Пожалуйста, введите содержимое новости</div>
        </div>

        <div>
            <button class="btn" type="submit">Сохранить изменения</button>
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
