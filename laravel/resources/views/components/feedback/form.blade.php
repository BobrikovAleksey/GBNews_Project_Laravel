<div class="contact-form">
    <form class="needs-validation" action="{{ route('feedback.store')  }}" method="POST" novalidate>
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label" for="name">Имя</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Введите Ваше имя"
                       value="{{ old('name') }}" required />
                <div class="invalid-feedback">Пожалуйста, введите Ваше имя</div>
            </div>

            <div class="form-group col-md-6">
                <label class="col-form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Введите Ваш Email"
                       value="{{ old('email') }}" required />
                <div class="invalid-feedback">Пожалуйста, введите Ваше email для обратной связи</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label" for="subject">Тема обращения</label>
            <input class="form-control" type="text" id="subject" name="subject" placeholder="Введите краткое содержание"
                   value="{{ old('subject') }}" required />
            <div class="invalid-feedback">Пожалуйста, введите тему обращения или краткое содержание сообщения</div>
        </div>

        <div class="form-group">
            <label class="col-form-label" for="message">Сообщение</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Введите ваше сообщение"
                      required >{{ old('message') }}</textarea>
            <div class="invalid-feedback">Пожалуйста, напишите нам сообщение</div>
        </div>

        <div class="mt-4">
            <button class="btn" type="submit">Отправить</button>
            <button class="btn ml-2" type="reset">Отменить</button>
        </div>
    </form>
</div>

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
