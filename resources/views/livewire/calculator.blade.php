<div class="calc-sm">
    <div class="container">
        <h2 class="section-title">Калькулятор фотокниги</h2>
@dump($sizes)
        <div class="calc-sm-title f">
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#photobook"></use>
            </svg>
            Размер фотокниги, см
            <select name="#" id="" class="sr-only" data-select
                    data-select-classes="select--sm w-auto select--rounded-sm select--no-border ml-auto lg:hidden">
                <option value="20×20">20×20 см</option>
                <option value="30×30">30×30 см</option>
                <option value="40×40">40×40 см</option>
                <option value="50×50">50×50 см</option>
            </select>
        </div>

        <div class="multi-switcher multi-switcher--sm w-max bg-divider mt-16 hidden lg:flex">
            <div class="multi-switcher__inner" data-menu='{"mode": "radio"}'>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="0" name="switcher" class="radio-sr-only" checked/>
                    15×15
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    15×20
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    20×15
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    15×15
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    20×20
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    22×22
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    25×25
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    29×29
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    15×20
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    20×29
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    20×15
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    25×20
                </label>
                <label class="multi-switcher__btn" data-menu-link>
                    <input type="radio" value="1" name="switcher" class="radio-sr-only"/>
                    29×20
                </label>
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
            <div class="range-slider w-full sm:w-350" style="--progress: 0.2">
                <input type="range" min="10" max="30" value="15" step="1"/>
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
            <input type="text"
                   class="field below-sm:field--sm below-sm:absolute below-sm:-top-45 below-sm:right-0 border w-85"
                   value="15"/>
        </div>
        <ul class="flex flex-wrap lg:flex-nowrap gap-32 max-w-700">
            <li each="3">
                <div class="flex">
                    <label class="block wh-80 relative rounded-sm overflow-hidden flex-shrink-0 cursor-pointer">
                        <input type="checkbox" name="package" value="1"
                               class="checkbox absolute top-8 right-8"/>
                        <img src="/assets/img/package.jpg" class="image-full" alt=""/>
                    </label>
                    <div class="pl-8 pt-8">
                        <div class="flex items-center">
                            Глянцевая обложка
                            <button
                                class="btn-base wh-24 flex-shrink-0 rounded bg-primary hover:bg-black text-sm text-white ml-8 self-start">
                                ?
                            </button>
                        </div>
                        <div class="font-bold">+500 ₽</div>
                    </div>
                </div>
            </li>
        </ul>
        <div
            class="mt-40 bg-divider pt-24 pb-32 md:pb-24 md:mr-48 px-16 md:px-40 rounded md:flex items-center max-w-800">
            <div class="md:mr-48">
                Вам нужно будет отправить<br/>
                нам не меньше 10 фотографий
            </div>
            <div class="mt-8 md:mt-0 md:mr-24 text-md font-bold">3450 ₽</div>
            <button class="btn btn--md btn--primary mt-8 md:mt-0">
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
