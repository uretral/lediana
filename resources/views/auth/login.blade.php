@extends('tpl.default')

@section('mainContent')
    <div class="main-wrapper bg-divider">
        <div class="container">
            <div class="mx-auto max-w-[58rem] mt-32 mb-64 sm:my-70">
                <h2 class="text-mob-3xl sm:text-3xl font-black">Авторизация</h2>
                <div class="text-mob-xl sm:text-lg mt-16">
                    <p>Авторизуйтесь с помощью вашего email и пароля.</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-16 sm:space-y-32 mt-32">
                        <label class="field-wrapper">
                            <span class="field-wrapper__title below-sm:sr-only">E-mail</span>
                            <x-input id="email" class="field sm:field--outlined-dark"
                                     type="email" name="email" :value="old('email')" required autofocus/>
                        </label>
                        <label class="field-wrapper">
                            <span class="field-wrapper__title below-sm:sr-only">Пароль</span>
                            <x-input id="password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     class="field sm:field--outlined-dark"
                                     required autocomplete="current-password"/>
                        </label>
                        <div>
                            <button class="btn btn--md btn--primary w-full">Войти</button>
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
                            <div class="soc-links__title w-full mb-8 md:mb-0 md:w-auto mr-12 lg:hidden xl:block">
                                Зарегистрироваться с помощью
                            </div>
                            <ul class="soc-links__list">
                                <li>
                                    <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden"
                                       aria-label="VK">
                                        <img src="/assets/img/vk.svg" alt="VK" class="image-full"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden"
                                       aria-label="Facebook">
                                        <img src="/assets/img/facebook.svg" alt="Facebook" class="image-full"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden"
                                       aria-label="Одноклассники">
                                        <img src="/assets/img/ok.svg" alt="Одноклассники" class="image-full"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank" class="block wh-48 rounded-full overflow-hidden"
                                       aria-label="Google">
                                        <img src="/assets/img/google.svg" alt="Google" class="image-full"/>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="space-x-24">
                            <a href="{{ route('register') }}" class="link link--primary">Создать новый профиль</a>
                            <a href="{{ route('password.request') }}" class="link link--primary">Не помню пароль</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
