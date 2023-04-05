<div class="container">

    @if($type === 'promo')
        <h2 class="text-xl sm:text-2xl mb-16 font-bold">Доступные размеры</h2>
    @else
        <h2 class="text-xl sm:text-2xl md:text-3xl font-black mb-8 sm:mb-16">{{$product->title_format}}</h2>
    @endif

    <div class="text-mob-lg md:text-lg prose">
        <p>Все размеры указаны в сантиметрах</p>
    </div>

    <div class="avaliable-sizes-wrapper avaliable-sizes-wrapper--1">
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--1">
            <ul class="avaliable-sizes-list">
                <livewire:formats.format-link :sizes="$sizes" size="15×15" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="15×20" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="20×15" :slug="$slug"/>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Instabook</span>
            </div>
        </div>
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--2">
            <ul class="avaliable-sizes-list">
                <livewire:formats.format-link :sizes="$sizes" size="15×15" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="20×20" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="22×22" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="25×25" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="29×29" :slug="$slug"/>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Квадратные</span>
            </div>
        </div>
    </div>
    <div class="avaliable-sizes-wrapper avaliable-sizes-wrapper--2">
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--1">
            <ul class="avaliable-sizes-list">
                <livewire:formats.format-link :sizes="$sizes" size="15×20" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="20×29" :slug="$slug"/>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Вертикальные</span>
            </div>
        </div>
        <div class="avaliable-sizes-list-wrapper avaliable-sizes-list-wrapper--2">
            <ul class="avaliable-sizes-list">
                <livewire:formats.format-link :sizes="$sizes" size="20×15" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="25×20" :slug="$slug"/>
                <livewire:formats.format-link :sizes="$sizes" size="29×20" :slug="$slug"/>
            </ul>
            <div class="avaliable-sizes-title">
                <span>Горизонтальные</span>
            </div>
        </div>
    </div>
    @if($type === 'promo')
        <a href="/{{$slug}}/editor">
        <button class="btn btn--md btn--primary mt-24 lg:mt-40 w-full sm:w-auto" >
            Далее
            <svg aria-hidden="true" class="wh-16 fill-current ml-5 mt-2">
                <use href="{{asset('assets/svg/svg.svg#arrow-right')}}"></use>
            </svg>
        </button>
        </a>
    @endif

    <livewire:modals.is-size-correct/>
</div>
