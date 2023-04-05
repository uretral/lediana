<div class="modal modal--status"  data-modal @if(!$open) hidden @endif  id="modal-delete-book">
    <div class="modal-content w-400 pt-48 sm:pt-64 pb-70 px-16 text-center" data-modal-content>
        <button class="btn-base btn-close modal-close" aria-label="Закрыть" data-close-modal wire:click="close">
            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#close"></use></svg>
        </button>
        <div class="text-mob-2xl sm:text-xl font-bold">Хотите изменить размер?</div>
        <div class="mt-8">До этого вы создавали {{$subject}} размером {{$formerSize}}, этот размер - {{$currentSize}}</div>
        <div class="mt-8">Вы уверены, что хотите изменить размер? Вам придётся создавать {{$subject}} заново, все страницы, фотографии и тексты будут удалены</div>
        <div class="grid gap-16 mt-32">
            <button class="btn btn--md btn--red w-full" data-close-modal wire:click="newSize">Да, новый размер</button>
            <button class="btn btn--md btn--red opacity-50 w-full" data-autofocus data-close-modal wire:click="formerSize">Нет продолжить создание</button>
        </div>
    </div>
</div>
