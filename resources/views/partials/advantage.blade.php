<div class="service-advantages">
    <div class="container">
        <h2 class="text-xl sm:text-2xl mb-16 font-bold">{!! @$title !!}</h2>
        <ul class="grid md:grid-cols-3 gap-0 lg:gap-40">
            @foreach(@$gifts as $gift)
                <li>
                    <div class="px-24 lg:px-40 mb-20 pt-50">
                        <img src="/assets/img/icon-calendar.svg" class="wh-55 object-contain mb-10" alt="calendar img"/>
                        <div class="font-bold">{!! @$gift->text !!}</div>
                    </div>
                    <img src="{{asset('storage/'.@$gift->img)}}" alt="gift image"/>
                </li>
            @endforeach
        </ul>
    </div>
</div>
