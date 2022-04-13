<section class="about-slider">
    <div class="about-slide">
        <div class="container">
            <div class="about-slide__info">
                <div class="about-slide__title">{!! @$info->title!!}</div>
                <div class="about-slide__desc">{!! @$info->text!!}</div>
                <div class="md:flex md:items-center mt-10 lg:mt-40">
                    <div class="text-mob-2xl lg:text-2xl font-bold mb-24 md:mb-0 md:mr-25">от @price(@$price) ₽</div>
                    <a href="" class="btn btn--md btn--primary">
                        {!! @$info->link_text!!}
                        <svg aria-hidden="true" class="wh-24 ml-8 fill-current"><use href="assets/svg/svg.svg#circle-arrow-right"></use></svg>
                    </a>
                </div>
            </div>
            <div class="about-slide__photo">
                <picture>
                    <source srcset="{{asset('storage/'.@$info->img_mobile)}}" media="(max-width: 767px)" />
                    <img src="{{asset('storage/'.@$info->img_mobile)}}" alt="{{strip_tags(@$info->title)}}" />
                </picture>
            </div>
        </div>
    </div>
</section>
