<div class="container">
    <h2 class="text-xl sm:text-2xl md:text-3xl font-black mb-8 sm:mb-16">Выберите размер холста</h2>
    <div class="text-mob-lg md:text-lg prose">
        <p>Все размеры указаны в сантиметрах</p>
    </div>
    <div class="avaliable-sizes-wrapper avaliable-sizes-wrapper--1">
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--1">
            <ul class="avaliable-sizes-list below-sm:flex-wrap">
                <livewire:formats.format-link :sizes="$sizes" size="25×30" :slug="$slug" :layout="169"/>
                <livewire:formats.format-link :sizes="$sizes" size="30×40" :slug="$slug" :layout="169"/>
                <livewire:formats.format-link :sizes="$sizes" size="40×50" :slug="$slug" :layout="169"/>
                <livewire:formats.format-link :sizes="$sizes" size="40×60" :slug="$slug" :layout="169"/>
                <div class="flex w-full gap-15 mt-40 items-end sm:contents">
                    <livewire:formats.format-link :sizes="$sizes" size="50×60" :slug="$slug" :layout="169"/>
                    <livewire:formats.format-link :sizes="$sizes" size="50×70" :slug="$slug" :layout="169"/>
                    <livewire:formats.format-link :sizes="$sizes" size="60×80" :slug="$slug" :layout="169"/>
                    <livewire:formats.format-link :sizes="$sizes" size="70×90" :slug="$slug" :layout="169"/>
                </div>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Вертикальные</span>
            </div>
        </div>
    </div>
    <div class="avaliable-sizes-wrapper avaliable-sizes-wrapper--2 justify-between">
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--1">
            <ul class="avaliable-sizes-list">
                <livewire:formats.format-link :sizes="$sizes" size="40×40" :slug="$slug" :layout="169"/>
                <livewire:formats.format-link :sizes="$sizes" size="70×70" :slug="$slug" :layout="169"/>
                <livewire:formats.format-link :sizes="$sizes" size="90×90" :slug="$slug" :layout="169"/>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Квадратные</span>
            </div>
        </div>
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--2">
            <ul class="avaliable-sizes-list">
                <livewire:formats.format-link :sizes="$sizes" size="100×70" :slug="$slug" :layout="169"/>
                <livewire:formats.format-link :sizes="$sizes" size="120×90" :slug="$slug" :layout="169"/>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Горизонтальные</span>
            </div>
        </div>
    </div>
    <button class="btn btn--md btn--primary mt-24 lg:mt-40 w-full sm:w-auto">
        Далее <svg aria-hidden="true" class="wh-16 fill-current ml-5 mt-2"><use href="/svg/svg.svg#arrow-right"></use></svg>
    </button>
</div>
