<div class="container">
    <h2 class="text-xl sm:text-2xl md:text-3xl font-black mb-8 sm:mb-16">Выберите размер открытки</h2>
    <div class="text-mob-lg md:text-lg prose mb-50 sm:mb-0">
        <p>Все размеры указаны в сантиметрах</p>
    </div>

    <ul class="flex flex-wrap items-end gap-y-65 gap-x-20 lg:gap-x-40 mt-40">
        <livewire:formats.format-link :sizes="$sizes" size="10×7" :slug="$slug"/>
        <livewire:formats.format-link :sizes="$sizes" size="15×10" :slug="$slug"/>
        <livewire:formats.format-link :sizes="$sizes" size="15×15" :slug="$slug"/>
        <div class="w-full flex sm:contents items-end gap-x-20">
            <livewire:formats.format-link :sizes="$sizes" size="15×20" :slug="$slug"/>
            <livewire:formats.format-link :sizes="$sizes" size="20×30" :slug="$slug"/>
        </div>
    </ul>

    @if($type === 'promo')
        <a href="/{{$slug}}/editor">
            <button class="btn btn--md btn--primary mt-24 lg:mt-40 w-full sm:w-auto">
                Далее
                <svg aria-hidden="true" class="wh-16 fill-current ml-5 mt-2">
                    <use href="{{asset('assets/svg/svg.svg#arrow-right')}}"></use>
                </svg>
            </button>
        </a>
    @endif
</div>
