<div class="lg:min-w-[17rem] lg:max-w-[30rem] ml-20 relative" x-data="{ open: false }" @click.outside="open = false">
    <div
        @click="open = !open" :class="open ? 'select--focus' : '' "
        class="select select--sm md:select--md select--rounded-sm select--no-border select--caret-position  ">
        <div class="select__primary">
            @if($this->printout->size)
                <button type="button" class="select-selected-option select-selected-option--single">
                    {{$this->printout->size->sizes}} см
                </button>
            @else
                <button type="button" class="select__control select__control--button">Размеры</button>
            @endif
        </div>
        <div class="select__actions">
            <div class="select__arrow"></div>
        </div>
        <div class="select-dropdown" :class="open ? 'select-dropdown--active' : '' ">
            <ul tabindex="-1" role="listbox" aria-labelledby="" id="test-list" class="select__options">
                @foreach($this->groupedSizes() as $title => $sizes)
                    <div class="select-optgroup" aria-disabled="false">
                        <div class="select-optgroup__title">{{$title}}</div>
                        <div class="select-optgroup__list">
                            @foreach($sizes as $size)
                                    <li
                                        class="select-option @if($this->printout->size->id === $size->size_id) select-option--focused @endif"
                                        wire:click="onFormatChanged({{$size->size_id}})">
                                        {{$size->size->sizes}} см
                                    </li>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
