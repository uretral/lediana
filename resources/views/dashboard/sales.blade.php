@extends('tpl.default')
@section('mainContent')

    <div class="main-wrapper relative before:bg-divider before:absolute before:inset-0 lg:before:left-1/2">
        <div class="container lg:grid grid-cols-[min-content,1fr] h-full relative">
            <div class="hidden lg:block">
                @include('partials.tpl.account-sidebar')
            </div>
            <div class="bg-divider lg:pl-55 pt-32 pb-64 md:py-64">
                @include('partials.tpl.account-breadcrumbs')
                <h1 class="text-mob-3xl sm:text-2xl lg:text-3xl font-black">Персональные предложения</h1>

                <div class="lg:hidden">
                    @include('partials.tpl.account-sidebar')
                </div>

                <ul class="space-y-32 -mx-container md:mx-0 mt-40">
                    <li each="3">
                        <div class="bg-primary-light md:rounded md:flex items-center text-center md:text-left">
                            <div class="p-15 md:pl-40 pt-32 md:pb-55 md:w-350 md:flex-shrink-0">
                                <div class="text-mob-2xl sm:text-xl font-bold mb-16">Ваша скидка 30% при заказе
                                    от 3 фотокниг
                                </div>
                                <div>По промокоду Lediana2018, акция действует до 28 октября 2018</div>
                                <button class="btn btn--primary btn--md mt-32">
                                    Создать свою фотокнигу
                                    <svg aria-hidden="true" class="fill-current wh-24 ml-8">
                                        <use href="/assets/svg/svg.svg.svg#circle-arrow-right"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-grow flex items-center justify-center pb-32 px-0 md:p-16">
                                <img src="/img/sales.png" class="w-350" alt=""/>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
