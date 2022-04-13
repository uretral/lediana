@extends('tpl.default')
@section('mainContent')
    <div class="main-wrapper bg-divider py-32 sm:py-64">

        <div class="container" data-page-menu="text">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-black mb-16 sm:mb-30 md:mb-55">{!! @$page->name !!}</h1>
            <div class="contents lg:grid grid-cols-[1fr,32rem] gap-60 xl:gap-140">
                <aside class="order-2 mb-24">
                    <div class="page-menu sticky top-24">
                        <button type="button" class="btn-base page-menu__title" data-toggle="page-menu">Содержание
                        </button>
                        <div data-page-menu="menu" class="page-menu__list-wrapper" data-dropdown id="page-menu"></div>
                    </div>
                </aside>
                <div class="max-w-[66rem]">
                    <div class="prose">
                        @foreach($page->texts as $text)
                            <h2>{!! @$text->title !!}</h2>

                            {!! @$text->text !!}

                            @isset($text->image)
                                <p>
                                    <img src="{{asset('storage/'.@$text->image)}}" alt="image"/>
                                </p>
                            @endisset

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


