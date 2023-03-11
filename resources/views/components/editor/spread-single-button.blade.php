<div class="flex gap-16 mb-24 lg:mb-64 overflow-auto disable-scrollbars">
    <div class="flex gap-16 overflow-auto disable-scrollbars sliding-items">
        @foreach($this->spreads as $key => $spread)
            <button
                wire:click="singleSpreadChange({{$spread->id}})"
                class="btn btn--sm @if($spread->id == $this->printout->current_spread_id) btn--primary @else btn--white @endif "
            >{{$key+1}}</button>
        @endforeach
    </div>
    @if($this->printout->spreads->count() > 1)
        <button class="btn btn--sm btn--white" wire:click="spreadRemove">-</button>
    @endif
    <button class="btn btn--sm btn--white" wire:click="spreadAdd">+</button>
</div>
