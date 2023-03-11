
<div class="photobook-cover-wrapper" {!! $this->layoutDoubleSpreadStyle() !!} >
    <div
        class="photobook-cover no-spine double  @if($this->printout->spread->template_id === 4) wide @endif"
         data-type="cover" data-style="3" x-data="{ oddSpread:  false , evenSpread: false}"> {{--{{\EditorStyles::classWide($this->printout->spread)}} --}}

        <div  class="photobook-cover-left @if($this->oddSpread->id === $this->printout->spread->id) edit @endif {{$this->oddSpread->color->class}}"
              wire:click="setSpread( {{$this->oddSpread->id}}, {{$this->oddSpread->spread_nr}} )"
        >
            {{--:class="$store.editor.oddClass" @click="$store.editor.activateOdd()"--}}
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
{{-- :class="$store.editor.evenClass"  @click="$store.editor.activateEven()"--}}
        <div  class="photobook-cover-right @if($this->evenSpread->id === $this->printout->spread->id) edit @endif {{$this->evenSpread->color->class}}"
              wire:click="setSpread( {{$this->evenSpread->id}}, {{$this->evenSpread->spread_nr}} )"
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

{{--{{$this->oddSpread->bg->class}}--}} {{-- {{$this->evenSpread->bg->class}}--}}
