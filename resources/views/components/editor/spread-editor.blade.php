<div class="editor-container pb-20 lg:pb-0">
    {{--slider btns--}}
    <div class="editor-btns">
        <button type="button" class="btn-base editor-btn editor-btn--left"
                wire:click="doubleSpreadChange( {{$this->buttonKey - 1 }})"
                aria-label="Предыдущая страница" @if($this->printout->current_spread_nr === 0) disabled @endif>
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#arrow-thin-left"></use>
            </svg>
        </button>
        <button type="button" class="btn-base editor-btn editor-btn--right"
                wire:click="doubleSpreadChange( {{is_null($this->buttonKey) ? 0 : $this->buttonKey + 1 }})"
                aria-label="Следующая страница" @if($this->buttonKey + 1 === count($this->buttons)) disabled @endif>
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#arrow-thin-right"></use>
            </svg>
        </button>
    </div>


    @if($this->printout->current_spread_nr)
        <x-editor.spread-double wire:key="spread-double"/>
    @else
        <x-editor.cover-double wire:key="cover-double"/>
    @endif


    <div class="flex lg:hidden items-center justify-between mt-16">
        <div class="flex gap-20">
            <button class="btn btn--sm btn--black btn--icon btn--outlined btn--rounded">−</button>
            <button class="btn btn--sm btn--black btn--icon btn--outlined btn--rounded">+</button>
        </div>
        <div class="flex gap-10">
            <button
                class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-primary hover:text-primary">
                <svg aria-hidden="true" class="wh-24 fill-current">
                    <use href="/assets/svg/svg.svg#save"></use>
                </svg>
            </button>
            <button
                class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-red hover:text-red"
                data-open-modal="modal-delete-book">
                <svg aria-hidden="true" class="wh-24 fill-current">
                    <use href="/assets/svg/svg.svg#trash"></use>
                </svg>
            </button>
        </div>
    </div>
    <div class="lg:hidden text-secondary text-tiny max-w-210 mt-4">Для редактирования разворота
        увеличьте его масштаб
    </div>
</div>
