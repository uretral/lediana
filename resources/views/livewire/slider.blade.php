<section class="main-slider" data-slider="main">

    <div class="swiper-container">
        <ul class="swiper-wrapper">

            @foreach($slides as $slide)

                <li class="swiper-slide main-slide">
                    <div class="container">
                        <div class="main-slide__title">
                            {!! $slide->title !!}
                        </div>
                        <div class="main-slide__desc">
                            {!! $slide->text !!}
                        </div>

                        <div class="main-slide__photo">
                            <picture>
                                <source srcset="{{asset('storage/'.$slide->img_mobile)}}" media="(max-width: 767px)"/>
                                <img src="{{asset('storage/'.$slide->img)}}" alt=""/>
                            </picture>
                        </div>
                    </div>
                </li>

            @endforeach

        </ul>
        <div class="swiper-pagination-wrapper">
            <div class="container">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
