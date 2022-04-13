<div class="container">
    <div class="about__photo">
        <img src="{{asset('storage/'.@$about->image)}}" alt="about image"/>
    </div>
    <div class="about__info">
        <h2 class="about__title">{{@$about->title}}</h2>
        <div class="about__desc">
            {!! @$about->description !!}
        </div>
        <div class="about-stats">
            @if(@$about->stat_sizes)
                <div class="about-stats__cell">
                    <svg aria-hidden="true">
                        <use href="/assets/svg/svg.svg#photobook"></use>
                    </svg>
                    <div>
                        {!! @$about->stat_sizes_text !!}
                    </div>
                </div>
            @endif
            @if(@$about->stat_pages)
                    <div class="about-stats__cell">
                        <svg aria-hidden="true">
                            <use href="/assets/svg/svg.svg#pages"></use>
                        </svg>
                        <div>
                            {!! @$about->stat_pages_text !!}
                        </div>
                    </div>
            @endif
            @if(@$about->stat_covers)
                    <div class="about-stats__cell">
                        <svg aria-hidden="true">
                            <use href="/assets/svg/svg.svg#thumbnail"></use>
                        </svg>
                        <div>
                            {!! @$about->stat_covers_text !!}
                        </div>
                    </div>
            @endif



        </div>
    </div>
</div>
