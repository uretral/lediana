<div class="photobook-cover-wrapper" wire:init="cover">
{{--    @dump($this->cover)--}}
    <div class="photobook-cover" data-type="cover" data-style="3">

        <div class="photobook-cover-left ">
            <div class="photobook-cover-left__logo"></div>
            <div class="photobook-cover-left__title">www.lediana.ru</div>
        </div>
        <div class="photobook-cover-middle ">
            <span>Нажмите, чтобы ввести свой текст</span>
        </div>

        <div class="photobook-cover-right edit">
            @if($this->cover && $this->cover->layout)
                @foreach($this->cover->layout->photos as $photos)
                    <x-editor.photo :photo="$photos" :spread="$this->cover" wire:key="photo_{{$this->cover->id}}"/>
                @endforeach
                @foreach($this->cover->layout->texts as $texts)
                    <x-editor.text :text="$texts" :spread="@$this->cover" wire:key="text_{{$this->cover->id}}"/>
                @endforeach
            @endif
        </div>


    </div>
</div>
