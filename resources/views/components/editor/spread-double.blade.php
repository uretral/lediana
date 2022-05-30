<div class="photobook-cover-wrapper" {!! $this->layoutDoubleSpreadStyle() !!} >
    <div class="photobook-cover no-spine double {{\EditorStyles::classWide($this->printout->spread)}}"
         data-type="cover" data-style="3" x-data="{ oddSpread:  false , evenSpread: false}">

        <div :class="$store.editor.oddClass"
             class="photobook-cover-left  {{$this->oddSpread->bg->class}}"
             @click="$store.editor.activateOdd()"
        >

            @if($this->oddSpread && $this->oddSpread->layout)
                @foreach($this->oddSpread->layout->photos as $photos)
                    <x-editor.photo :photo="$photos" :spread="$this->oddSpread" wire:key="photo_{{$this->oddSpread->id}}"/>
                @endforeach
                @foreach($this->oddSpread->layout->texts as $texts)
                    <x-editor.text :text="$texts" :spread="$this->oddSpread" wire:key="text_{{$this->oddSpread->id}}"/>
                @endforeach
            @endif

        </div>
        <div class="photobook-cover-middle"></div>
        <div :class="$store.editor.evenClass" class="photobook-cover-right  {{$this->evenSpread->bg->class}}"
             @click="$store.editor.activateEven()"
        >

            @if($this->evenSpread && $this->evenSpread->layout)
                @foreach(@$this->evenSpread->layout->photos as $photos)
                    <x-editor.photo :photo="$photos" :spread="$this->evenSpread" wire:key="photo_{{$this->evenSpread->id}}"/>
                @endforeach
                @foreach(@$this->evenSpread->layout->texts as $texts)
                    <x-editor.text :text="$texts" :spread="$this->evenSpread" wire:key="text_{{$this->evenSpread->id}}"/>
                @endforeach
            @endif

        </div>


    </div>
</div>
