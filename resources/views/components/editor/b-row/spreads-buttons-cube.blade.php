<div class="mb-24 lg:mb-64 lg:flex">
    <div class="overflow-auto disable-scrollbars -mx-container px-container lg:px-0 lg:mx-0">
        <div class="flex items-center gap-16 mb-16 lg:mb-0">
            <span class="w-70 flex-shrink-0 sm:w-auto">Снаружи</span>
            @foreach($this->arrSpreads as $key => $spread)
                @if($key < 6)
                    <button class="btn btn--sm @if($this->printout->current_spread_nr == $spread) btn--primary @else btn--white @endif"  wire:click="setSpreadButtonSingle({{$key}})">{{$spread}}</button>
                @endif
            @endforeach
        </div>
    </div>
    <div class="overflow-auto disable-scrollbars -mx-container px-container lg:px-0 lg:mr-0 lg:ml-48">
        <div class="flex items-center gap-16">
            <span class="w-70 flex-shrink-0 sm:w-auto">Внутри</span>
            @foreach($this->arrSpreads as $key => $spread)
                @if($key >= 6 && is_array($spread))
                    <button class="btn btn--sm @if(in_array($this->printout->current_spread_nr,$spread)) btn--primary @else btn--white @endif" wire:click="setSpreadButtonDouble({{$key}})">
                        {{$spread[0]}}<span class="h-22 w-1 bg-divider mx-10"></span>{{$spread[1]}}
                    </button>
                @endif
                @if($key >= 6 && !is_array($spread))
                    <button class="btn btn--sm @if($this->printout->current_spread_nr == $spread) btn--primary @else btn--white @endif" wire:click="setSpreadButtonSingle({{$key}})">{{$spread}}</button>
                @endif

            @endforeach
        </div>
    </div>
</div>


