@extends('tpl.default')

@section('mainContent')

    <div class="main-wrapper">

        <livewire:slider/>

        <div class="my-40 md:my-70 xl:my-100">
            <div class="container">
                <ul class="grid lg:grid-cols-2 gap-50 md:gap-20 xl:gap-40">

                    @foreach($promoCards as $card)
                        <li>
                            <a href="/{{@$card->page->slug}}" class="info-block">
                                <div class="info-block__info">
                                    <div class="info-block__title">{{@$card->title}}</div>
                                    <div class="info-block__price">от @price(@$card->page->price_from) ₽</div>
                                    <div class="info-block__desc">
                                        <svg aria-hidden="true" class="info-block__icon">
                                            <use href="/assets/svg/svg.svg#circle-arrow-right"></use>
                                        </svg>
                                        <div class="prose">
                                            {!! @$card->text !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="info-block__photo">
                                    <picture>
                                        <source srcset="{{asset('storage/'.@$card->img_mobile)}}" media="(max-width: 767px)"/>
                                        <img src="{{asset('storage/'.@$card->img)}}" alt="{{@$card->title}}"/>
                                    </picture>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>

        <div class="my-70 xl:my-100" data-slider="reviews">
            <livewire:reviews />
        </div>

        <div class="home-footer">
            @include('partials.promotion', ['promotion' => @$page->promotion])
        </div>

    </div>


@endsection
