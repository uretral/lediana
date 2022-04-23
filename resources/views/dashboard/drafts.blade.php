@extends('tpl.default')
@section('mainContent')
    <div class="main-wrapper relative before:bg-divider before:absolute before:inset-0 lg:before:left-1/2">
        <div class="container lg:grid grid-cols-[min-content,1fr] h-full relative">
            <div class="hidden lg:block">
                 @include('partials.tpl.account-sidebar')
            </div>
            <div class="bg-divider lg:pl-55 pt-32 pb-64 md:py-64">
                @include('partials.tpl.account-breadcrumbs')
                <h1 class="text-mob-3xl sm:text-2xl lg:text-3xl font-black">Мои заказы</h1>

                <div class="lg:hidden">
                     @include('partials.tpl.account-sidebar')
                </div>

                <ul class="space-y-32 mt-45 md:mt-55">
                    <li each="3">
                        <div class="bg-white rounded md:flex px-16 md:px-0">
                            <div class="wh-140 xl:wh-150 relative ml-13 md:ml-0">
                                <div class="absolute inset-0 -left-13 -top-13 bg-primary-light rounded-sm"></div>
                                <img src="/assets/img/order-preview.jpg" class="image-full rounded-tl-sm rounded-br-sm relative" alt="" />
                            </div>
                            <div class="py-16 pb-32 md:p-24 md:pl-40 md:pb-48 flex-grow">
                                <div class="xl:flex items-center justify-between">
                                    <div class="text-lg font-bold">Дизайн PhotoBook</div>
                                    <div class="text-secondary text-sm whitespace-nowrap xl:ml-16 mt-8 md:mt-0">Сегодня 12:59</div>
                                </div>
                                <div class="text-secondary text-sm mt-4">Статус: <span class="text-primary">Заказ отправлен на печать</span></div>
                                <div class="inline-flex items-center h-32 px-16 rounded-sm bg-divider text-sm mt-16">20 страниц / 10 разворотов</div>
                            </div>
                            <div class="pt-16 pb-60 md:p-40 md:pt-20 md:pb-48 border-t md:border-t-0 md:border-l border-divider md:w-300 text-sm flex flex-col items-start">
                                <button class="btn btn--md btn--primary mb-16 w-full sm:w-auto">Отправить на печать</button>
                                <button class="btn p-4 -mx-4 hover:text-primary" data-toggle-modal="modal-confirm">
                                    <svg aria-hidden="true" class="wh-24 fill-current mr-8"><use href="/assets/svg/svg.svg.svg#trash"></use></svg>
                                    <span>Удалить черновик</span>
                                </button>
                                <button class="btn p-4 -mx-4 hover:text-primary" data-toggle-modal="ask-question">
                                    <svg aria-hidden="true" class="wh-24 fill-current mr-8"><use href="/assets/svg/svg.svg.svg#comment"></use></svg>
                                    <span>Задать вопрос</span>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
