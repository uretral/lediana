<div class="service-create">
    <div class="container">
        <div class="service-create__info">
            <h2 class="service-create__title">{!! @$creation->title !!}</h2>
            <div class="service-create__desc prose">
                {!! @$creation->text !!}
            </div>
            <a href="{{@$creation->btn_link}}" class="btn btn--md btn--primary">
                {!! @$creation->btn_text !!}
                <svg aria-hidden="true" class="wh-24 ml-8 fill-current">
                    <use href="/assets/svg/svg.svg#circle-arrow-right"></use>
                </svg>
            </a>
        </div>
        <div class="service-create__photo">
            <picture>
                <source srcset="{{asset('storage/'.@$creation->img_mobile)}}" media="(max-width: 550px)"/>
                <img src="{{asset('storage/'.@$creation->img)}}" alt=""/>
            </picture>
        </div>
    </div>
</div>
