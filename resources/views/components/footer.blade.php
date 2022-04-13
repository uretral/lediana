<footer class="footer">
    <div class="footer-top">
        <div class="modal modal--default bg-white/80" hidden data-modal id="ask-question">
            <!-- <div class="modal-backdrop" data-modal-backdrop></div> -->
            <div class="modal-content w-600 bg-divider" data-modal-content>
                <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal>
                    <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
                </button>
                <div class="px-32 pt-48 pb-64 space-y-16 sm:space-y-32">
                    <h2 class="text-lg font-bold">Вопрос</h2>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Вопрос</span>
                        <textarea name="" class="field sm:field--outlined-dark" rows="4" placeholder="Вопрос"></textarea>
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Телефон</span>
                        <input name="" class="field sm:field--outlined-dark" placeholder="Телефон" />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">Вотсап</span>
                        <input name="" class="field sm:field--outlined-dark" placeholder="Вотсап" />
                    </label>
                    <label class="field-wrapper">
                        <span class="field-wrapper__title below-sm:sr-only">E-mail</span>
                        <input name="" class="field sm:field--outlined-dark" placeholder="E-mail" />
                    </label>
                    <div>
                        <button class="btn btn--md btn--primary w-full">Задать</button>
                        <div class="text-secondary text-sm mt-8">
                            <p>Нажимая кнопку «Задать», я соглашаюсь с <a href="#">политикой конфиденциальности</a> и согласием на <a href="#">обработку персональных данных</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-40 lg:h-80 lg:flex items-center justify-between">
            <ul class="col-count-2 md:flex md:flex-wrap -mx-4 md:-mx-12">
                @foreach(@$menu->footerMainMenu->pages as $menuItem)
                    <li>
                        <a href="/{{@$menuItem->slug}}" class="block p-4 md:p-12 transition hover:text-primary">
                            @if(empty(@$menuItem->menu_title)) {{@$menuItem->title}} @else {{@$menuItem->menu_title}} @endif
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="soc-links mt-20 lg:mt-0">
                <div class="soc-links__title w-full mb-8 md:mb-0 md:w-auto mr-12 lg:hidden xl:block">Мы в соцмедиа</div>
                <ul class="soc-links__list">
                    <li>
                        <a href="#" target="_blank" class="soc-links__link soc-links__link--facebook" aria-label="Facebook">
                            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#facebook"></use></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="soc-links__link soc-links__link--youtube" aria-label="Youtube">
                            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#youtube"></use></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="soc-links__link soc-links__link--vk" aria-label="VK">
                            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#vk"></use></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="soc-links__link soc-links__link--instagram" aria-label="Instagram">
                            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#instagram"></use></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-divider">
        <div class="container grid grid-cols-2 sm:block pt-40 sm:pt-15 pb-80 sm:pb-24 text-tiny text-secondary">
            <ul class="inline-flex flex-col sm:flex-row gap-14 sm:gap-24 sm:mr-24">
                @foreach(@$menu->footerTextMenu->pages as $menuItem)
                    <li>
                        <a href="/{{@$menuItem->slug}}" class="transition hover:text-primary">
                            @if(empty(@$menuItem->menu_title)) {{@$menuItem->title}} @else {{@$menuItem->menu_title}} @endif
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="flex flex-col sm:flex-row xl:inline-flex gap-12 sm:gap-24 sm:mt-8 xl:mt-0">
                <a href="mailto:{{$communications['email']->view_value}}"
                   class="transition hover:text-primary">{{$communications['email']->view_value}}</a>

                <div class="inline-flex gap-8 sm:gap-16">

                    <svg aria-hidden="true" class="w-18 h-18"><use href="/svg/svg.svg#phone"></use></svg>

                    <div class="space-y-4 sm:space-y-0 sm:contents">

                        <a href="tel:{{$communications['phone']->value}}"
                           class="transition hover:text-primary" >{{$communications['phone']->view_value}}</a>

                        <a href="tel:{{$communications['phone_sub']->value}}"
                           class="transition hover:text-primary">{{$communications['phone_sub']->view_value}}</a>

                    </div>
                </div>
                <a class="font-bold transition hover:text-primary" href="#requisites">Реквизиты</a>
            </div>
            <div class="flex flex-col sm:flex-row gap-8 sm:gap-24 mt-28 sm:mt-8 col-span-full">
                <div class="copyrights">©2021 www.lediana.ru, Все права защищены</div>
                <a href="#" class="transition hover:text-primary">Политика конфиденциальности</a>
            </div>
        </div>
    </div>
</footer>

@dump($communications['phone']->value)
