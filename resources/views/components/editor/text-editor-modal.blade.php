@if($open)
    <div class="modal modal--default modal--opened modal--full-opened" data-modal="" id="edit-text" aria-modal="true"
         aria-hidden="false" role="dialog" tabindex="-1">
        <div class="modal-content w-600 modal-content--opened modal-content--full-opened" data-modal-content=""
             aria-hidden="false">
            <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal="" wire:click="textModalClose()">
                <svg aria-hidden="true">
                    <use href="{{asset('assets/svg/svg.svg#close')}}"></use>
                </svg>
            </button>
            <div class="px-16 sm:px-32 pt-48 pb-64 grid gap-16">
                <h2 class="text-lg font-bold">Редактирование текста</h2>
                <div class="text-secondary text-sm sm:text-right mb-10 sm:-mb-10 -mt-10">Осталось 40 символов</div>
                <label class="field-wrapper field-wrapper--light">
                    <span class="field-wrapper__title w-180 below-sm:sr-only">Основной текст</span>
                    <textarea wire:model.lazy="textModal.text"
                              class="field below-sm:field--dark sm:field--outlined-light" rows="3" placeholder="Основной текст"
                              style="{{$textModal->style}}"
                    ></textarea>
                </label>

                <x-editor.modal-text-editor.font-name/>

                <x-editor.modal-text-editor.font-size/>


                <label class="field-wrapper field-wrapper--light">
                    <span class="field-wrapper__title w-180 flex-grow sm:flex-grow-0">Цвет</span>
                    <input type="color" name="head" wire:model="textModal.font_color" value="{{$textModal->font_color}}" class="field field--light">
                </label>
                <div class="inline-grid sm:grid-flow-col sm:justify-start gap-16 sm:mt-40">
                    <button class="btn btn--md btn--primary" wire:click="textModalSave()">Применить</button>
                    <button class="btn btn--md btn--secondary" wire:click="textModalClose()">Отмена</button>
                </div>
            </div>
        </div>
    </div>
@endif
