<div class="editor-container editor-container--photos pb-20 lg:pb-0">

    @if($arrows)
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
    @endif
    <div class="photos-cover-wrapper" style="padding-bottom: @if($this->spread->layout_id == 168) 121.5% @else {{$this->padding * 100}}% @endif">
        @if($this->spread->layout->photos)
            @foreach($this->spread->layout->photos as $photo)

                <x-editor.c-row.spreads.photo
                    :photo="$photo"
                    :spread="$this->spread"
                    :z="5"
                    wire:key="photo_{{$this->spread->id}}"
                />

            @endforeach
        @endif
    </div>

    <div class="flex lg:hidden justify-end w-full gap-10 mt-16">
        <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-primary hover:text-primary">
            <svg aria-hidden="true" class="wh-24 fill-current">
                <use href="/svg/svg.svg#disorient"></use>
            </svg>
        </button>
        <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-primary hover:text-primary">
            <svg aria-hidden="true" class="wh-24 fill-current">
                <use href="/svg/svg.svg#save"></use>
            </svg>
        </button>
        <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-red hover:text-red"
                data-open-modal="modal-delete-book">
            <svg aria-hidden="true" class="wh-24 fill-current">
                <use href="/svg/svg.svg#trash"></use>
            </svg>
        </button>
    </div>
</div>

