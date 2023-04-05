<div class="editor-container pb-20 lg:pb-0">

    <div class="editor-btns">
        <button type="button" class="btn-base editor-btn editor-btn--left" @if($this->printout->spread_view <= 0) disabled @endif aria-label="Предыдущая страница" wire:click="prevNextCubeSpread(-1)">
            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#arrow-thin-left"></use></svg>
        </button>
        <button type="button" class="btn-base editor-btn editor-btn--right" @if($this->printout->spread_view >= 9) disabled @endif aria-label="Следующая страница" wire:click="prevNextCubeSpread(1)">
            <svg aria-hidden="true"><use href="/assets/svg/svg.svg#arrow-thin-right"></use></svg>
        </button>
    </div>

    <div class="cube-cover-wrapper @if(!$this->evenSpread) single @endif  @if($this->oddSpread && $this->oddSpread->is_double) double @endif">
        @if($this->oddSpread)
        <div class="cube-cover">
            <div class="edit-photo">
                @foreach($this->oddSpread->layout->photos as $photo)

                    <x-editor.c-row.spreads.cube-photo
                        :photo="$photo"
                        :spread="$this->oddSpread"
                        :z="5"
                        wire:key="photo_{{$this->oddSpread->id}}"
                    />

                @endforeach
            </div>
            <div class="h-28 sm:h-32 w-35 sm:w-40 text-sm sm:text-black flex items-center justify-center absolute top-12 sm:top-16 left-1/2 -translate-x-1/2 bg-white/30 rounded-sm">
                {{$this->oddSpread->spread_nr}}
            </div>
        </div>
        @endif
        @if($this->evenSpread)
                <div class="cube-cover">
                    <div class="edit-photo">
                        @foreach($this->evenSpread->layout->photos as $photo)

                            <x-editor.c-row.spreads.cube-photo
                                :photo="$photo"
                                :spread="$this->evenSpread"
                                :z="5"
                                wire:key="photo_{{$this->evenSpread->id}}"
                            />

                        @endforeach
                    </div>
                    <div class="h-28 sm:h-32 w-35 sm:w-40 text-sm sm:text-black flex items-center justify-center absolute top-12 sm:top-16 left-1/2 -translate-x-1/2 bg-white/30 rounded-sm">
                        {{$this->evenSpread->spread_nr}}
                    </div>
                </div>
        @endif

    </div>
    <div class="flex lg:hidden items-center justify-between mt-16">
{{--        <div class="flex gap-20">
            <button class="btn btn--sm btn--black btn--icon btn--outlined btn--rounded">−</button>
            <button class="btn btn--sm btn--black btn--icon btn--outlined btn--rounded">+</button>
        </div>--}}
        <div class="flex gap-10">
            <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-primary hover:text-primary" wire:click="savePrintout">
                <svg aria-hidden="true" class="wh-24 fill-current"><use href="/assets/svg/svg.svg#save"></use></svg>
            </button>
            <button class="btn btn--sm btn--black btn--icon btn--text btn--rounded hover:border-red hover:text-red" data-open-modal="modal-delete-book" wire:click="deletePrintout">
                <svg aria-hidden="true" class="wh-24 fill-current"><use href="/assets/svg/svg.svg#trash"></use></svg>
            </button>
        </div>
    </div>
{{--    <div class="lg:hidden text-secondary text-tiny max-w-210 mt-4">Для редактирования разворота увеличьте его масштаб</div>--}}
</div>
