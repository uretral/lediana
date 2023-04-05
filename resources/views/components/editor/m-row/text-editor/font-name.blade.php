<div class="field-wrapper field-wrapper--light sm:mt-16"  x-data="{ open: false }" @click.outside="open = false">
    <span class="field-wrapper__title w-180 below-sm:sr-only">Шрифт</span>
    <div class="select select--rounded below-sm:select--dark select--caret-position "
         @click="open = !open" :class="open ? 'select--expanded select--focus' : '' "
         id="select-qptpt1x">
        <div class="select__primary">
            <button size="1" type="button" class="select__control select__control--button"
                    aria-haspopup="listbox" role="combobox" aria-expanded="false" autocomplete="off"
                    autocapitalize="off" spellcheck="off" id="select-qptpt1x"
                    aria-labelledby="select-qptpt1x">
                {{ @$this->getFontName($this->textModal->font_name) }}
            </button>
        </div>
        <div class="select__actions">
            <div class="select__arrow"></div>
            <button type="button" aria-label="Очистить" class="select__clear" hidden=""></button>
        </div>
        <div class="select-dropdown" :class="open ? 'select-dropdown--active' : '' ">
            <ul tabindex="-1" role="listbox" aria-labelledby="" id="select-qptpt1x-list" class="select__options">
                @foreach($this->printout->fontNames as $fontName)
                    <li id="select-qptpt1x-option-0" role="option" wire:click="setFontName('{{$fontName->id}}')"
                        @if($this->textModal->font_name == $fontName->id )
                            class="select-option   --select-option--focused " aria-selected="true"
                        @else
                            class="select-option" aria-selected="false"
                        @endif
                        style="{{$fontName->style}}" >

                        {{$fontName->title}}

                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
