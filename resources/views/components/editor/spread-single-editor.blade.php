<div class="editor-container editor-container--photos pb-20 lg:pb-0" x-data="{formal: @js($this->printout->size->width)}">
    <div class="editor-btns">
        <button type="button" class="btn-base editor-btn editor-btn--left"
                wire:click="leftSliderArrowClick()"
                aria-label="Предыдущая страница" {{$this->leftSliderArrowState()}}>
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#arrow-thin-left"></use>
            </svg>
        </button>
        <button type="button" class="btn-base editor-btn editor-btn--right"
                wire:click="rightSliderArrowClick()"
                aria-label="Следующая страница" {{$this->rightSliderArrowState()}}>
            <svg aria-hidden="true">
                <use href="/assets/svg/svg.svg#arrow-thin-right"></use>
            </svg>
        </button>
    </div>
    <div class="photos-cover-wrapper" id="photo-cover"  style="--h: {{$this->coverHeight}}" >
        <div class="photos-cover" data-style="1" > {{-- :class="$store.editor.evenClass" @click="$store.editor.activateEven()" --}}

{{--            <div class="photo photo-edit crop-container photo-frame tblr">

                <div class="crop-subject" @click="$store.editor.getCoverWidth()"></div>

            </div>--}}

            <div class="photo crop-container  " style="top: 0%; right: 0%; bottom: 0%; left: 0%; ">
                <div @dragover="subjectOnEnter" @drop="onPhotoDrop" @click="onPhotoDrop" class="crop-subject " data-spread="1" data-layout="44" data-photo="60" id="60-1-44">
                </div>
            </div>

{{--            <div class="corner"></div>--}}




{{--            <div class="edit-photo">
                <!-- <div class="edit-photo__photo" style="background-image: url(../img/photo.jpg)"></div> -->
                <div class="edit-photo__placeholder">
                    Загрузите<br />
                    фото
                </div>
                <div class="edit-photo__actions">
                    <button class="btn-base btn-action" aria-label="Увеличить" data-close-modal>
                        <svg aria-hidden="true"><use href="/assets/svg/svg.svg#zoom"></use></svg>
                    </button>
                    <button class="btn-base btn-action" aria-label="Повернуть" data-close-modal>
                        <svg aria-hidden="true"><use href="/assets/svg/svg.svg#rotate"></use></svg>
                    </button>
                    <button class="btn-base btn-action" aria-label="Закрыть" data-close-modal>
                        <svg aria-hidden="true"><use href="/assets/svg/svg.svg#close"></use></svg>
                    </button>
                </div>
            </div>--}}
        </div>
    </div>

    <div class="flex lg:hidden justify-end w-full gap-10 mt-16">
        <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-primary hover:text-primary">
            <svg aria-hidden="true" class="wh-24 fill-current"><use href="/assets/svg/svg.svg#disorient"></use></svg>
        </button>
        <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-primary hover:text-primary">
            <svg aria-hidden="true" class="wh-24 fill-current"><use href="/assets/svg/svg.svg#save"></use></svg>
        </button>
        <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-red hover:text-red" data-open-modal="modal-delete-book">
            <svg aria-hidden="true" class="wh-24 fill-current"><use href="/assets/svg/svg.svg#trash"></use></svg>
        </button>
    </div>
</div>
