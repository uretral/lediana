<div class="service-gift">
    <div class="container">
        <div class="service-gift__info">
            <div class="service-gift__title">{!! @$gift->title !!}</div>
            <div class="service-gift__desc">{!! @$gift->text !!}</div>
            <a href="{{@$gift->btn_link}}" class="btn btn--md btn--primary">
                {!! @$gift->btn_text !!}
                <svg aria-hidden="true" class="wh-24 ml-8 fill-current">
                    <use href="/assets/svg/svg.svg#circle-arrow-right"></use>
                </svg>
            </a>
        </div>
        <div class="service-gift__photo">
            <img src="{{asset('storage/'.@$gift->img)}}" alt="gift image"/>
        </div>
    </div>
</div>
