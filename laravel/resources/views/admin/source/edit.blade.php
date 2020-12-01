@extends('layouts.main')

@php
    /**
     * @noinspection PhpFullyQualifiedNameUsageInspection
     * @noinspection PhpUndefinedClassInspection
     * @var \App\Models\Source $source
     */
    $category_id = old('category_id') ?? $source->category_id;
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

    <h2>Редактирование источника новостей с #ID = {{ $source->id  }}</h2>

    <form class="needs-validation mt-lg-4" action="{{ route('admin.source.update', ['source' => $source])  }}"
          method="POST" novalidate>
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="category_id">Категория новости</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                            @if ($category->id === $category_id) selected @endif>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Наименование</label>
            <input class="form-control" type="text" id="name" name="name" maxlength="128" required
                   placeholder="Введите наименование источника новостей" value="{{ old('name') ?? $source->name }}"/>
            <div class="invalid-feedback">Пожалуйста, введите наименование источника новостей</div>
        </div>

        <div class="form-group">
            <label for="link">Ссылка на RSS-канал</label>
            <input class="form-control" type="text" id="link" name="link" maxlength="256" required
                   placeholder="Вставьте ссылку на RSS-канал" value="{{ old('link') ?? $source->link }}"/>
            <div class="invalid-feedback">Пожалуйста, вставьте ссылку на RSS-канал</div>
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
