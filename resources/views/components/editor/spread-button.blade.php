<div class="flex gap-16 mb-24 lg:mb-64 overflow-auto">
    <div class="flex gap-16 overflow-auto disable-scrollbars sliding-items">

        @foreach($this->printout->spreads as $spread)
            <button
                wire:click="singleSpreadChange({{$spread->spread_nr}})"
                class="btn btn--sm @if($spread->spread_nr == $this->printout->current_spread_nr) btn--primary @else btn--white @endif "
            >{{$spread->spread_nr + 1}}</button>
        @endforeach

    </div>
    @if($this->printout->spreads->count() > 1)
        <button class="btn btn--sm btn--white" wire:click="onSpreadsQtyChange(1)">-</button>
    @endif
    <button class="btn btn--sm btn--white" wire:click="onSpreadsQtyChange(1, true)">+</button>

</div>
