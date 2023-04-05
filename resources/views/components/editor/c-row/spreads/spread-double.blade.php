<div class="photobook-cover-wrapper" {!! $this->layoutDoubleSpreadStyle() !!} >
    <div
        class="photobook-cover no-spine double  @if($this->printout->spread->template_id === 4) wide @endif"
        data-type="cover" data-style="3" x-data="{ oddSpread:  false , evenSpread: false}">

        @if($this->oddSpread)

        <div
            class="photobook-cover-left @if($this->oddSpread->id === $this->printout->spread->id) edit @endif {{$this->oddSpread->color->class}}"
            wire:click="setSpread( {{$this->oddSpread->id}}, {{$this->oddSpread->spread_nr}} )"
        >
            @if($this->oddSpread->color->id == 3)
                <x-editor.c-row.spreads.photo-background :spread="$this->oddSpread" side="left"/>
            @endif
            @if($this->oddSpread && $this->oddSpread->layout)
                @foreach($this->oddSpread->layout->photos as $key => $photos)
                    <x-editor.c-row.spreads.photo :photo="$photos" :spread="$this->oddSpread" :z="$key"
                                                  wire:key="photo_{{$this->oddSpread->id}}"/>
                @endforeach
                @foreach($this->oddSpread->layout->texts as $key => $texts)
                    <x-editor.c-row.spreads.text :text="$texts" :spread="$this->oddSpread"
                                                 wire:key="text_{{$this->oddSpread->id}}"/>
                @endforeach
            @endif

        </div>
        @endif
        @if($this->evenSpread)

            <div class="photobook-cover-middle"></div>

            <div
                class="photobook-cover-right @if($this->evenSpread->id === $this->printout->spread->id) edit @endif {{$this->evenSpread->color->class}}"
                wire:click="setSpread( {{$this->evenSpread->id}}, {{$this->evenSpread->spread_nr}} )"
            >
                @if($this->evenSpread->color->id == 3)
                    <x-editor.c-row.spreads.photo-background :spread="$this->evenSpread" side="right"/>
                @endif
                @if($this->evenSpread && $this->evenSpread->layout)
                    @foreach(@$this->evenSpread->layout->photos as $photos)
                        <x-editor.c-row.spreads.photo :photo="$photos" :spread="$this->evenSpread"
                                                      wire:key="photo_{{$this->evenSpread->id}}"/>
                    @endforeach
                    @foreach(@$this->evenSpread->layout->texts as $texts)
                        <x-editor.c-row.spreads.text :text="$texts" :spread="$this->evenSpread"
                                                     wire:key="text_{{$this->evenSpread->id}}"/>
                    @endforeach
                @endif

            </div>

        @endif
    </div>
</div>
