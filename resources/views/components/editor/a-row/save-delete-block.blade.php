<div class="hidden lg:flex ml-auto gap-24">
    <button class="btn btn--md btn--black btn--outlined hover:border-primary hover:text-primary" wire:click="savePrintout">
        <svg aria-hidden="true" class="wh-24 mr-8 fill-current">
            <use href="/assets/svg/svg.svg#save"></use>
        </svg>
        Сохранить
    </button>
    <button class="btn btn--md btn--black btn--outlined hover:border-red hover:text-red"
            data-open-modal="modal-delete-book" wire:click="deletePrintout">
        <svg aria-hidden="true" class="wh-24 mr-8 fill-current">
            <use href="/assets/svg/svg.svg#trash"></use>
        </svg>
        Удалить
    </button>
</div>
