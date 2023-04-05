<div class="flex gap-16 mb-24 lg:mb-64 overflow-auto">

    <button
        class="btn btn--sm @if($this->printout->current_spread_nr === 0) btn--primary @else btn--white @endif"
        wire:click="doubleCoverChange()">Обложка</button>

    <div class="flex gap-16 overflow-auto disable-scrollbars sliding-items">
        @foreach($this->buttons as $key =>  $button)
            <button
                wire:click="doubleSpreadChange({{$key}})"
                class="btn btn--sm @if(in_array($this->printout->current_spread_id,$button['spreads'])) btn--primary @else btn--white @endif ">
                {{$button['numbers'][0]}}
                <span class="h-22 w-1 bg-divider mx-10"></span>
                {{$button['numbers'][1]}}
            </button>
        @endforeach
    </div>

    @if($this->printout->spreads->count() > 1)
        <button class="btn btn--sm btn--white" wire:click="spreadAddRemove(2)">-</button>
    @endif
    <button class="btn btn--sm btn--white" wire:click="spreadAddRemove(2, true)">+</button>

</div>
