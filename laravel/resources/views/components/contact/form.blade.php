<div class="contact-form">
    <form action="{{ route('contact.store')  }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="col-form-label" for="name">Имя</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Введите ваше имя"
                       value="{{ old('name') }}" required/>
            </div>

            <div class="form-group col-md-6">
                <label class="col-form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Введите ваш Email"
                       value="{{ old('email') }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-form-label" for="subject">Тема</label>
            <input class="form-control" type="text" id="subject" name="subject" placeholder="Краткое содержание"
                   value="{{ old('subject') }}" />
        </div>

        <div class="form-group">
            <label class="col-form-label" for="message">Сообщение</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Введите ваше сообщение"
                >{{ old('message') }}</textarea>
        </div>

        <div>
            <button class="btn" type="submit">Отправить</button>
        </div>
    </form>
</div>
