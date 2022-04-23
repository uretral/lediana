@extends('tpl.default')
@section('mainContent')

    <div class="main-wrapper relative before:bg-divider before:absolute before:inset-0 lg:before:left-1/2">
        <div class="container lg:grid grid-cols-[min-content,1fr] h-full relative">
            <div class="hidden lg:block">
                @include('partials.tpl.account-sidebar')
            </div>
            <div class="bg-divider lg:pl-55 pt-32 pb-64 md:py-64">
                @include('partials.tpl.account-breadcrumbs')
                <h1 class="text-mob-3xl sm:text-2xl lg:text-3xl font-black">Личные данные</h1>

                <div class="lg:hidden">
                    @include('partials.tpl.account-sidebar')
                </div>

                <div class="space-y-16 sm:space-y-32 mt-32 max-w-700">
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Имя</span>
                        <input name="name" class="field sm:field--outlined-dark" placeholder="Имя" value="{{@\Auth::user()->name}}" />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Фамилия</span>
                        <input name="surname" class="field sm:field--outlined-dark" placeholder="Фамилия" value="{{@\Auth::user()->surname}}" />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Телефон</span>
                        <input name="phone" class="field sm:field--outlined-dark" placeholder="Телефон" value="{{@\Auth::user()->phone}}" />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">E-mail</span>
                        <input name="email" class="field sm:field--outlined-dark" placeholder="E-mail" value="{{@\Auth::user()->email}}"/>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 sm:gap-24">
                        <div class="field-wrapper">
                            <span class="field-wrapper__title below-sm:sr-only">Страна</span>
                            <select name="country" id="" class="field" data-select data-select-classes="select--rounded select--no-outlined sm:select--outlined-dark" value="{{@\Auth::user()->country}}">
                                <option value="ru">Россия</option>
                                <option value="by">Беларусь</option>
                                <option value="kz">Казахстан</option>
                                <option value="md">Молдова</option>
                                <option value="gz">Грузия</option>
                            </select>
                        </div>
                        <label class="field-wrapper">
                            <span class="field-wrapper__title below-sm:sr-only">Город</span>
                            <input name="city" class="field sm:field--outlined-dark" placeholder="Город" value="{{@\Auth::user()->city}}"/>
                        </label>
                    </div>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Адрес</span>
                        <input name="address" class="field sm:field--outlined-dark" placeholder="Адрес" value="{{@\Auth::user()->address}}"/>
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Индекс</span>
                        <input name="zip" class="field sm:field--outlined-dark" placeholder="Адрес" value="{{@\Auth::user()->zip}}"/>
                    </label>

                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Пароль</span>
                        <input name="password" type="password" class="field sm:field--outlined-dark" placeholder="Пароль" />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Подтвердить</span>
                        <input name="password" type="password" class="field sm:field--outlined-dark" placeholder="Пароль" />
                    </label>
                    <button class="btn btn--md btn--primary w-full">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

@endsection
