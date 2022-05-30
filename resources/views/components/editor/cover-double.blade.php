<div class="photobook-cover-wrapper" wire:init="cover">
    <div class="photobook-cover" data-type="cover" data-style="3">

        <div class="photobook-cover-left ">
            <div class="photobook-cover-left__logo"></div>
            <div class="photobook-cover-left__title">www.lediana.ru</div>
        </div>
        <div class="photobook-cover-middle ">
            <span>Нажмите, чтобы ввести свой текст</span>
        </div>

        <div class="photobook-cover-right  edit">

            @if($this->cover && $this->cover->layout)
                @foreach($this->cover->layout->photos as $photos)
                    <x-editor.photo :photo="$photos" :spread="$this->cover" wire:key="photo_{{$this->cover->id}}"/>
                @endforeach
                @foreach($this->cover->layout->texts as $texts)
                    <x-editor.text :text="$texts" :spread="@$this->cover" wire:key="text_{{$this->cover->id}}"/>
                @endforeach
            @endif





            {{--
                                                @foreach($layout->photos as $photo)
                                                    <div class="photo"
                                                         style="top: {{$photo->top}}%; right: {{$photo->right}}%; bottom: {{$photo->bottom}}%; left: {{$photo->left}}%;"
                                                    ></div>
                                                @endforeach

                                                    @foreach($layout->texts as $text)
                                                        <div class="texts"
                                                             style="top: {{$text->top}}%; right: {{$text->right}}%; bottom: {{$text->bottom}}%; left: {{$text->left}}%;"
                                                        >
                                                            <span style="text-align: {{$text->align}};">{!! $text->placeholder !!}</span>
                                                        </div>
                                                    @endforeach

            --}}



            {{--                                <button class="btn-base absolute left-0 top-0 wh-full"
                                                    data-open-modal="edit-text"></button>
                                            <div class="edit-photo ">
                                                <div class="edit-photo__photo "
                                                     style="background-image: url(/assets/img/photo.jpg)"></div>
                                                <div class="edit-photo__actions">
                                                    <button class="btn-base btn-action" aria-label="Увеличить" data-close-modal>
                                                        <svg aria-hidden="true">
                                                            <use href="/assets/svg/svg.svg#zoom"></use>
                                                        </svg>
                                                    </button>
                                                    <button class="btn-base btn-action" aria-label="Повернуть" data-close-modal>
                                                        <svg aria-hidden="true">
                                                            <use href="/assets/svg/svg.svg#rotate"></use>
                                                        </svg>
                                                    </button>
                                                    <button class="btn-base btn-action" aria-label="Закрыть" data-close-modal>
                                                        <svg aria-hidden="true">
                                                            <use href="/assets/svg/svg.svg#close"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <span>Нажмите, чтобы ввести свой текст</span>
                                            <span>2021</span>--}}
        </div>


    </div>
</div>
