@extends('tpl.default')
@section('mainContent')
<div class="main-wrapper bg-divider">
    <div class="container">
        <div class="mx-auto max-w-[58rem] mt-32 mb-64 sm:my-70">
            <h2 class="text-mob-3xl sm:text-3xl font-black">Регистрация</h2>
            <div class="text-mob-xl sm:text-lg mt-16">
                <p>После регистрации вы сможете сохранять созданные проекты в черновики и отслеживать статусы их изготовления.</p>
            </div>



            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="space-y-16 sm:space-y-32 mt-32">
                <label class="field-wrapper">
                    <span class="field-wrapper__title below-sm:sr-only">Фамилия</span>
                    <x-input id="surname" class="field sm:field--outlined-dark" type="text" name="surname"  placeholder="Фамилия"  :value="old('surname')" required autofocus />
                </label>
                <label class="field-wrapper">
                    <span class="field-wrapper__title below-sm:sr-only">Имя</span>
                    <x-input id="name" class="field sm:field--outlined-dark" type="text" name="name"  placeholder="Имя"  :value="old('name')" required autofocus />
                </label>
                <label class="field-wrapper">
                    <span class="field-wrapper__title below-sm:sr-only">Телефон</span>
                    <x-input id="phone" class="field sm:field--outlined-dark" type="text" name="phone"  placeholder="Телефон"
                             :value="old('phone')" required autofocus
                             data-mask="+7 (000) 000-00-00" pattern="\\+7 ([0-9]{3}\) [0-9]{3}[\-][0-9]{2}[\-][0-9]{2}" title="(000) 000-00-00"/>
                </label>
                <label class="field-wrapper">
                    <span class="field-wrapper__title below-sm:sr-only">E-mail</span>
                    <x-input id="email" class="field sm:field--outlined-dark" type="email" name="email" :value="old('email')" placeholder="E-mail" required />
                </label>
                <label class="field-wrapper">
                    <span class="field-wrapper__title below-sm:sr-only">Пароль</span>
                    <x-input id="password" class="field sm:field--outlined-dark" type="password" name="password" placeholder="Пароль" required autocomplete="new-password" />
                </label>
                <label class="field-wrapper">
                    <span class="field-wrapper__title below-sm:sr-only">Подтвердить</span>
                    <x-input id="password_confirmation" class="field sm:field--outlined-dark" type="password" placeholder="Подтвердить пароль" name="password_confirmation" required />
                </label>
                <div>
                    <button class="btn btn--md btn--primary w-full">Создать профиль</button>
                    <div class="prose text-secondary text-sm mt-8">
                        <p>Регистируюясь я соглашаюсь с
                            @foreach(@$menu->politics->pages as $menuItem)
                                <a target="_blank" href="/{{@$menuItem->slug}}">политикой конфиденциальности</a>
                            @endforeach
                            и согласием на
                            @foreach(@$menu->personal->pages as $menuItem)
                                <a target="_blank" href="/{{@$menuItem->slug}}">обработку персональных
                                    данных</a>
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="soc-links mt-20 lg:mt-0">
                    <div class="soc-links__title w-full mb-8 md:mb-0 md:w-auto mr-12 lg:hidden xl:block">Зарегистрироваться с помощью</div>
                    <ul class="soc-links__list">
                        <li>
                            <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden" aria-label="VK">
                                <img src="/assets/img/vk.svg" alt="VK" class="image-full" />
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden" aria-label="Facebook">
                                <img src="/assets/img/facebook.svg" alt="Facebook" class="image-full" />
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden" aria-label="Одноклассники">
                                <img src="/assets/img/ok.svg" alt="Одноклассники" class="image-full" />
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden" aria-label="Google">
                                <img src="/assets/img/google.svg" alt="Google" class="image-full" />
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('login') }}" class="inline-block link link--primary">Уже зарегистрирован</a>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection
