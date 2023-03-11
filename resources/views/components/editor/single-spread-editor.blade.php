<div class="editor-container editor-container--photos pb-20 lg:pb-0">
    {{--slider btns--}}
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
    <div class="photos-cover-wrapper"
         style="padding-bottom: @if($this->spread->layout_id == 168) 121.5% @else {{$this->padding * 100}}% @endif">
        @foreach($this->spread->layout->photos as $photo)
            <div class="photos-cover" data-style="1" style="{{\EditorStyles::photoStyle($photo)}}">
                <div class="corner"></div>


                <div class="edit-photo crop-container">

                    <div

                        @dragover="subjectOnEnter"
                        @drop="onPhotoDrop"
                        @click="onPhotoDrop"
                        class="crop-subject"
                        data-spread="{{$this->spread->spread_nr}}"
                        data-layout="{{$this->spread->layout_id}}"
                        data-photo="{{$photo->id}}"
                        id="{{$photo->id}}-{{$this->spread->spread_nr}}-{{$this->spread->layout_id}}"
                        data-spread-id="{{$this->spread->id}}"
                    >
                        @if($pic = $this->getPhotoHtml($this->spread,$photo))
                            {!! $pic->html !!}
                            7
                            <button class="crop-restart" @click.stop="onResetCropper"></button>
                            <button class="crop-delete" @click.stop="onDeleteCropper"></button>
                        @endif

                    </div>
                    {{--                    <div class="edit-photo__placeholder">
                                            Загрузите<br/>
                                            фото
                                        </div>--}}
                </div>


            </div>
        @endforeach
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

