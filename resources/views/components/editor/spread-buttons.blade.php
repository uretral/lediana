<div class="flex gap-16 mb-24 lg:mb-64 overflow-auto">
    <button
        class="btn btn--sm @if($this->printout->current_spread_nr === 0) btn--primary @else btn--white @endif"
        wire:click="onSpreadsChanged( 0, 'doubleSpreadChange' )">Обложка
    </button>
    <div class="flex gap-16 overflow-auto disable-scrollbars sliding-items">
        @for($i = 1; $i < $this->spreadsCount(); $i ++)
            @if($i%2)
            <button
                wire:click="onSpreadsChanged( {{$i}}, 'doubleSpreadChange' )"
                class="btn btn--sm @if($i == $this->printout->current_spread_nr) btn--primary @else btn--white @endif ">
                {{$i}}
                <span class="h-22 w-1 bg-divider mx-10"></span>
                {{$t = $i+1}}
            </button>
            @endif
        @endfor
    </div>
    @if($this->printout->spreads_cnt > 1)
        <button class="btn btn--sm btn--white" wire:click="onSpreadsQtyChange(2)">-</button>
    @endif
    <button class="btn btn--sm btn--white" wire:click="onSpreadsQtyChange(2, true)">+</button>

</div>
