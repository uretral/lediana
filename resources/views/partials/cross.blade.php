<div class="service-blocks">
    <div class="container">
        <ul class="service-blocks__list">
            @foreach(@$cross_links as $link)
                <li class="service-blocks__item">
                    <div class="service-block">
                        <div class="service-block__info">
                            <div class="service-block__title">{{@$link->title}}</div>
                            <div class="service-block__desc">
                                {!! @$link->text !!}
                            </div>
                            <div class="service-block__price">
                                <span>от @price(@$link->link->price_from) ₽</span>
                                <a href="/{{@$link->link->slug}}" class="btn btn--md btn--primary">
                                    Подробнее
                                    <svg aria-hidden="true" class="wh-24 ml-8 fill-current"><use href="/assets/svg/svg.svg#circle-arrow-right"></use></svg>
                                </a>
                            </div>
                        </div>
                        <div class="service-block__photo">
                            <img src="{{asset('storage/'.@$link->image)}}" alt="{{@$link->title}}" />
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
