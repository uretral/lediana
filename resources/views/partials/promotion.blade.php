<div class="container home-footer__container">
    <div class="home-footer__title">{{@$promotion->title}}</div>
    <div class="home-footer__subtitle">{{@$promotion->subtitle}}</div>
    <div class="home-footer__desc">
        {!! @$promotion->description !!}
    </div>
    <button class="btn btn--primary btn--md">
        Получить консультацию
        <svg aria-hidden="true" class="fill-current wh-24 ml-8">
            <use href="/assets/svg/svg.svg#circle-arrow-right"></use>
        </svg>
    </button>
    <div class="home-footer__photo">
        <img src="{{asset('storage/'.@$promotion->image)}}" alt="promotion image"/>
    </div>
</div>
