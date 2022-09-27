<div class="container">
    <h2 class="text-xl sm:text-2xl md:text-3xl font-black mb-8 sm:mb-16">Выберите размер фотографий</h2>
    <div class="text-mob-lg md:text-lg prose mb-50 sm:mb-0">
        <p>
            Все размеры указаны в сантиметрах, ориентацию<br class="below-sm:hidden"/>
            фотографий можно сменить на следующем шаге
        </p>
    </div>
    <div class="mb-40">
        <ul class="flex items-end flex-wrap gap-y-65 gap-x-20 lg:gap-x-40">
            <livewire:formats.format-link :sizes="$sizes" size="10×10" :slug="$slug" hint="Инстаграм"/>
            <livewire:formats.format-link :sizes="$sizes" size="7.9×7.9" :slug="$slug" hint="Полароид"/>
            <livewire:formats.format-link :sizes="$sizes" size="10.5×15.2" :slug="$slug"/>

            <div class="w-full flex sm:contents items-end gap-x-20">
                <livewire:formats.format-link :sizes="$sizes" size="15.2×21.6" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="20.3×30.5" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="21×30.5" :slug="$slug"/>
            </div>
        </ul>
    </div>
    <ul class="flex items-end gap-20 lg:gap-40">
        <livewire:formats.format-link :sizes="$sizes" size="30.5×40.6" :slug="$slug"/>
        <livewire:formats.format-link :sizes="$sizes" size="30.5×42" :slug="$slug"/>
        <livewire:formats.format-link :sizes="$sizes" size="30.5×45.7" :slug="$slug"/>
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
