<div class="container">
    <h2 class="text-xl sm:text-2xl md:text-3xl font-black mb-8 sm:mb-16">Выберите размер фотокубика</h2>
    <div class="text-mob-lg md:text-lg prose mb-50 sm:mb-0">
        <p>Все размеры указаны в сантиметрах</p>
    </div>

    <ul class="flex items-end gap-20 lg:gap-40 mt-40">
        <livewire:formats.format-link :sizes="$sizes" size="13×13" :slug="$slug" :layout="169"/>
        <livewire:formats.format-link :sizes="$sizes" size="20×20" :slug="$slug" :layout="169"/>
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
    <livewire:modals.is-size-correct/>
</div>
