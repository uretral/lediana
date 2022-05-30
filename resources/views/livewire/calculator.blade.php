<div class="calc-sm">
    <div class="container">
        <h2 class="section-title">Калькулятор фотокниги</h2>
{{--@dump($sizes[0])--}}
        <div class="calc-sm-title f">
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#photobook"></use>
            </svg>
            Размер фотокниги, см
            <select name="#" id="" class="sr-only" data-select
                    data-select-classes="select--sm w-auto select--rounded-sm select--no-border ml-auto lg:hidden">
                @foreach($sizes as $item)
                    <option value="{{$item->sizes}}">
                        {{$item->sizes}} см
                    </option>
                @endforeach
            </select>
        </div>

        <div class="multi-switcher multi-switcher--sm w-max bg-divider mt-16 hidden lg:flex">
            <div class="multi-switcher__inner" data-menu='{"mode": "radio"}'>
                @foreach($sizes as $key => $item)
                <label class="multi-switcher__btn  @if($item->sizes == $size) active @endif" data-menu-link wire:key="{{$key}}">
                    <input type="radio" wire:model="size"  class="radio-sr-only" value="{{$item->sizes}}"
                           @if($item->sizes == $size) checked  @endif/>
                    {{$item->sizes}}
                </label>
                @endforeach
                <div class="multi-switcher__marker"></div>
            </div>
        </div>

        <div class="calc-sm-title mt-20 lg:mt-40">
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#pages"></use>
            </svg>
            Количество разворотов
        </div>
        <div class="mb-55 sm:flex items-center gap-24 relative">
            <div class="range-slider w-full sm:w-350"
                 style="--progress: {{($spreads - $rangeMin) / ($rangeMax - $rangeMin)}}">
                <input type="range" id="spreadsSlider"  min="{{$rangeMin}}" max="{{$rangeMax}}"
                       value="{{$spreads}}" step="1" wire:model.debounce.500ms="spreads"/>
                <div class="range-slider__thumb"><i></i><i></i><i></i></div>
                <div class="range-slider__steps">
                    <span class="range-slider__step range-slider__step--lg"><span>10</span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step range-slider__step--lg"><span>15</span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step range-slider__step--lg"><span>20</span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step range-slider__step--lg"><span>25</span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step"><span></span></span>
                    <span class="range-slider__step range-slider__step--lg"><span>30</span></span>
                </div>
            </div>
            <script>
                document.querySelectorAll(".range-slider").forEach((slider) => {

                    let input = slider.querySelector("input");

                    let checkProgress = () => {
                        let min = input.min;
                        let max = input.max;
                        let value = input.value;
                        slider.style.setProperty("--progress", (value - min) / (max - min));
                    };
                    checkProgress();
                    input.addEventListener("input", checkProgress);
                });

            </script>
            <input type="text" id="spreads"
                   class="field below-sm:field--sm below-sm:absolute below-sm:-top-45 below-sm:right-0 border w-85" value="{{$spreads}}"/>

        </div>

        <ul class="flex flex-wrap lg:flex-nowrap gap-32 max-w-700">
            @foreach($current->cover as $index => $cover)
                <li>
                    <div class="flex yyy">
                        <label class="block wh-80 relative rounded-sm overflow-hidden flex-shrink-0 cursor-pointer">
                            <input type="radio" wire:model="coverId" value="{{$cover->prop_id}}"
                                   class="checkbox absolute top-8 right-8"/>
                            <img src="/assets/img/package.jpg" class="image-full" alt=""/>
                        </label>
                        <div class="pl-8 pt-8">
                            <div class="flex items-center">
                                {{$cover->cover->title}}
                                <button
                                    class="btn-base wh-24 flex-shrink-0 rounded bg-primary hover:bg-black text-sm text-white ml-8 self-start">
                                    ?
                                </button>
                            </div>
                            <div class="font-bold">+ {{$cover->price}} ₽</div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
        <div
            class="mt-40 bg-divider pt-24 pb-32 md:pb-24 md:mr-48 px-16 md:px-40 rounded md:flex items-center max-w-800">
            <div class="md:mr-48">
                Вам нужно будет отправить<br/>
                нам не меньше {{$minPhotos}} фотографий
            </div>
            <div class="mt-8 md:mt-0 md:mr-24 text-md font-bold">{{$finalPrice}} ₽</div>

            <button class="btn btn--md btn--primary mt-8 md:mt-0" wire:click.debounce="goToEditor()">
                Заказать фотокнигу
                <svg aria-hidden="true" class="wh-16 fill-current ml-5 mt-2">
                    <use href="/assets/svg/svg.svg#arrow-right"></use>
                </svg>
            </button>
        </div>
        <div class="text-secondary mt-24 md:mt-16 max-w-800">
            Срок изготовления макета — 3-5 дней, после составления дизайна мы свяжемся с вами и согласуем с вами
            макет, и только после распечатаем Вашу фотокнигу.
        </div>
    </div>
</div>
