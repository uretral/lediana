<div class="photobook-cover-wrapper" {!! $this->layoutDoubleSpreadStyle() !!}  wire:init="cover">
{{--    @dump($this->cover)--}}
    <div class="photobook-cover" data-type="cover" data-style="3">

        <div class="photobook-cover-left {{$this->printout->spread->color->class}}">
            <div class="photobook-cover-left__logo {{$this->printout->spread->color->class}}"></div>
            <div class="photobook-cover-left__title">www.lediana.ru</div>
        </div>
        <div class="photobook-cover-middle {{$this->printout->spread->color->class}}">
            <span  wire:click="spineEdit()">{{$this->printout->spine_text}}</span>
        </div>

        <div class="photobook-cover-right edit {{$this->printout->spread->color->class}}">
            @if($this->cover && $this->cover->layout)
                @foreach($this->cover->layout->photos as $photos)
                    <x-editor.c-row.spreads.photo :photo="$photos" :spread="$this->cover" wire:key="photo_{{$this->cover->id}}"/>
                @endforeach
                @foreach($this->cover->layout->texts as $texts)
                    <x-editor.c-row.spreads.text :text="$texts" :spread="@$this->cover" wire:key="text_{{$this->cover->id}}"/>
                @endforeach
            @endif
        </div>


    </div>
</div>
