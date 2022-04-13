<div class="container">
    <h2 class="text-xl md:text-2xl font-bold md:font-black mb-30 md:mb-35">Счастливые отзывы</h2>
    <div class="swiper-container pt-20">

        <ul class="reviews-list swiper-wrapper">

            @foreach($reviews as $review)

                <li  class="swiper-slide" style="display: unset">


                    <div class="review">
                        <div class="review__photo">
                            <div class="review__photo-inner">
                                <img src="{{asset('storage/'.@$review->product_img)}}" alt="" />
                            </div>
                        </div>
                        <div class="review-author">
                            <div class="review-author__photo">
                                <img src="{{asset('storage/'.@$review->avatar)}}" alt="" />
                            </div>
                            <div class="review-author__info">
                                <div class="review-author__title">{{$review->user}}</div>
                                <div class="review-author__subtitle">Фотокнига</div>
                            </div>
                        </div>
                        <div class="review__desc prose">
                            {!! @$review->text !!}
                        </div>
                        @include('partials.rating', ['rate' => $review->rate ?? 0])
                    </div>

                </li>

            @endforeach


        </ul>
        <div class="swiper-pagination mt-20"></div>
    </div>
    <div class="flex gap-24 mt-20 lg:mt-40">

        @if($reviews->hasMorePages())
            <button class="btn @if($btn) {{$btn}} @else btn--secondary @endif btn--md flex-grow justify-start btn--no-loader hidden lg:inline-flex" wire:click="load">
                <!-- <div class="loader wh-24 mr-8"></div> -->
                <svg aria-hidden="true" class="fill-current wh-24 mr-8">
                    <use href="/svg/svg.svg#circle-arrow-down"></use>
                </svg>
                Загрузить ещё
            </button>
        @endif

        <a href="/reviews.html" class="btn btn--secondary btn--md w-full lg:w-auto">Все отзывы</a>
    </div>
</div>
