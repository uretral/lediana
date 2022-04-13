<div class="modal modal--default" hidden data-modal id="requisites">
    <!-- <div class="modal-backdrop" data-modal-backdrop></div> -->
    <div class="modal-content" data-modal-content>
        <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal>
            <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
        </button>
        <div class="prose px-10 md:px-60 py-40 md:py-70 text-mob-lg md:text-lg">
            <h2>Реквизиты</h2>
            <div>
                <p>ИП Гудков Виктор Андреевич</p>
                <p>ИНН: 166110191222</p>
                <p>ОГРНИП: 313169019300075</p>
                <p>Фактический адрес: 420044, РФ, РТ, Казань, Короленко, 35а</p>
                <p>Юридический адрес: 422527, РФ, РТ, Зеленодольский район, д. Воронино, ул. Озерная, д.19</p>
                <p>Тел.: 89033405807, 89033405807</p>
                <p>Почта: ledianaru@mail.ru</p>
            </div>
        </div>
    </div>
</div>

<button class="btn btn--md btn--secondary-dark question-toggler" data-toggle-modal="ask-question">
    <div class="wh-8 rounded-full bg-primary mr-10"></div>
    Есть вопрос?
</button>

<div class="modal modal--status bg-white/80" hidden data-modal id="modal-success">
    <div class="modal-content w-400 pt-48 sm:pt-64 pb-70 px-16 bg-divider text-center" data-modal-content>
        <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal>
            <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
        </button>
        <div class="wh-140 sm:wh-170 bg-primary-light rounded-full inline-grid place-content-center mb-24">
            <svg aria-hidden="true" class="wh-85 fill-white"><use href="/svg/svg.svg#checked"></use></svg>
        </div>
        <div class="text-mob-2xl sm:text-2xl font-bold">Попап успеха</div>
        <div class="mt-8">Поздравляем, все получилось!</div>
        <button class="btn btn--md btn--white mt-24 w-full sm:w-auto" data-close-modal>Хорошо</button>
    </div>
</div>

<div class="modal modal--status" hidden data-modal id="modal-confirm">
    <div class="modal-content w-400 pt-48 sm:pt-64 pb-70 px-16 text-center" data-modal-content>
        <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal>
            <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
        </button>
        <div class="text-mob-2xl sm:text-2xl font-bold">Вы уверены?</div>
        <div class="mt-8">Назад пути нет!</div>
        <div class="inline-flex gap-16">
            <button class="btn btn--md btn--red mt-24 w-full sm:w-auto min-w-100" data-close-modal>Да</button>
            <button class="btn btn--md btn--black btn--red mt-24 w-full sm:w-auto min-w-100 opacity-50" data-autofocus data-close-modal>Нет</button>
        </div>
    </div>
</div>

<div class="modal modal--status" hidden data-modal id="modal-delete-book">
    <div class="modal-content w-400 pt-48 sm:pt-64 pb-70 px-16 text-center" data-modal-content>
        <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal>
            <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
        </button>
        <div class="text-mob-2xl sm:text-xl font-bold">Удалить фотокнигу?</div>
        <div class="mt-8">После удаления вы не сможете её редактировать и отправить в печать</div>
        <div class="grid gap-16 mt-32">
            <button class="btn btn--md btn--red w-full" data-close-modal>Да, удалить</button>
            <button class="btn btn--md btn--red opacity-50 w-full" data-autofocus data-close-modal>Не удалять</button>
        </div>
    </div>
</div>

<div class="modal modal--default" hidden data-modal id="edit-text">
    <!-- <div class="modal-backdrop" data-modal-backdrop></div> -->
    <div class="modal-content w-600" data-modal-content>
        <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal>
            <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
        </button>
        <div class="px-16 sm:px-32 pt-48 pb-64 grid gap-16">
            <h2 class="text-lg font-bold">Редактирование текста</h2>
            <div class="text-secondary text-sm sm:text-right mb-10 sm:-mb-10 -mt-10">Осталось 40 символов</div>
            <label class="field-wrapper field-wrapper--light">
                <span class="field-wrapper__title w-180 below-sm:sr-only">Основной текст</span>
                <textarea name="" class="field below-sm:field--dark sm:field--outlined-light" rows="3" placeholder="Основной текст"></textarea>
            </label>
            <label class="field-wrapper field-wrapper--light">
                <span class="field-wrapper__title w-180 below-sm:sr-only">Доп. текст</span>
                <input name="" class="field below-sm:field--dark sm:field--outlined-light" placeholder="Доп. текст" />
            </label>
            <div class="field-wrapper field-wrapper--light sm:mt-16">
                <span class="field-wrapper__title w-180 below-sm:sr-only">Шрифт</span>
                <select name="#" id="" class="select-field" data-select data-select-classes="select--rounded below-sm:select--dark">
                    <option value="Шрифт">Шрифт</option>
                    <option value="Times New Roman" selected>Times New Roman</option>
                    <option value="by">Беларусь</option>
                    <option value="kz">Казахстан</option>
                    <option value="md">Молдова</option>
                    <option value="gz">Грузия</option>
                </select>
            </div>
            <div class="field-wrapper field-wrapper--light">
                <span class="field-wrapper__title w-auto sm:w-180 flex-grow sm:flex-grow-0">Размер</span>
                <div class="multi-switcher multi-switcher--md sm:multi-switcher--md multi-switcher--rounded bg-divider">
                    <div class="multi-switcher__inner" data-menu='{"mode": "radio"}'>
                        <label class="multi-switcher__btn below-sm:px-15" data-menu-link>
                            <input type="radio" value="0" name="size" class="radio-sr-only" checked />
                            30%
                        </label>
                        <label class="multi-switcher__btn below-sm:px-15" data-menu-link>
                            <input type="radio" value="1" name="size" class="radio-sr-only" />
                            60 %
                        </label>
                        <label class="multi-switcher__btn below-sm:px-15" data-menu-link>
                            <input type="radio" value="2" name="size" class="radio-sr-only" />
                            90 %
                        </label>
                        <div class="multi-switcher__marker"></div>
                    </div>
                </div>
            </div>
            <label class="field-wrapper field-wrapper--light">
                <span class="field-wrapper__title w-180 flex-grow sm:flex-grow-0">Цвет</span>
                <input type="color" name="head" value="#232325" class="field field--light" />
            </label>
            <div class="inline-grid sm:grid-flow-col sm:justify-start gap-16 sm:mt-40">
                <button class="btn btn--md btn--primary">Применить</button>
                <button class="btn btn--md btn--secondary">Отмена</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--default" hidden data-modal id="cube-video">
    <div class="modal-content w-900 xxl:w-950 below-sm:rounded-sm" data-modal-content>
        <button class="btn-base btn-close modal-close below-sm:top-10 below-sm:right-10" aria-label="Закрыть" data-close-modal>
            <svg aria-hidden="true"><use href="/svg/svg.svg#close"></use></svg>
        </button>
        <div class="px-10 sm:px-60 pt-45 sm:pt-30 pb-60 xxl:pb-100">
            <div class="video-wrapper bg-divider mb-16 sm:mb-32">
                <button class="btn btn--primary btn--md btn--icon center">
                    <svg aria-hidden="true" class="wh-18"><use href="/svg/svg.svg#play"></use></svg>
                </button>
            </div>
            <div class="text-mob-2xl sm:text-xl xxl:text-2xl font-bold">Узнайте подробнее о конструкции фотокубика</div>
            <button class="btn btn--md btn--primary mt-16 sm:mt-24">Перейти в редактор</button>
        </div>
    </div>
</div>
