@extends('layouts.main')

@section('content')
<div class="contact">
    <div class="container">
        <div class="row align-items-center">
            <div class="contact-form w-100">
                <form action="{{ route('Admin.news.store')  }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="author">Автор</label>
                            <input class="form-control" type="text" id="author" name="author"
                                   placeholder="Введите автора" value="{{ old('author') }}"/>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="source">Источник</label>
                            <input class="form-control" type="text" id="source" name="source"
                                   placeholder="Введите источник" value="{{ old('source') }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="title">Заголовок</label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Введите заголовок"
                               value="{{ old('title') }}" required/>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="cover">Ссылка на обложку</label>
                        <input class="form-control" type="text" id="cover" name="cover"
                               placeholder="Вставьте ссылку на обложку" value="{{ old('cover') }}"/>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="body">Содержание новости</label>
                        <textarea class="form-control" id="body" name="body" rows="5"
                                  placeholder="Введите содержимое новости"
                            >{!! old('body') !!}</textarea>
                    </div>

                    <div>
                        <button class="btn" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
