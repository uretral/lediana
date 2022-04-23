@extends('tpl.default')
@section('mainContent')

    <div class="main-wrapper bg-divider">
        <div class="container">
            <div class="mx-auto max-w-[58rem] mt-32 mb-64 sm:my-70">
                <h2 class="text-mob-3xl sm:text-3xl font-black">Восстановление пароля</h2>
                <div class="text-mob-xl sm:text-lg mt-16">
                    <p>Введите ваш email и телефон, который вы использовали при регистрации. Мы создадим новый пароль и вышелем его на ваш email.</p>
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                <div class="space-y-16 sm:space-y-32 mt-32">
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">E-mail</span>
                        <x-input id="email" class="field sm:field--outlined-dark" type="email" name="email" :value="old('email')" placeholder="E-mail" required />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Телефон</span>
                        <x-input id="phone" class="field sm:field--outlined-dark" type="text" name="phone"  placeholder="Телефон"
                                 :value="old('phone')" required autofocus
                                 data-mask="+7 (000) 000-00-00" pattern="\\+7 ([0-9]{3}\) [0-9]{3}[\-][0-9]{2}[\-][0-9]{2}" title="(000) 000-00-00"/>
                    </label>

                    <button class="btn btn--md btn--primary w-full">Отправить</button>

                    <a href="{{ route('login') }}" class="inline-block link link--primary">Помню пароль</a>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
