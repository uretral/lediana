<div class="field-wrapper field-wrapper--light">
    <span class="field-wrapper__title w-auto sm:w-180 flex-grow sm:flex-grow-0">Размер</span>
    <div
        class="multi-switcher multi-switcher--md sm:multi-switcher--md multi-switcher--rounded bg-divider">
        <div class="multi-switcher__inner" data-menu="{&quot;mode&quot;: &quot;radio&quot;}"
             style="--marker-offset-top:0px; --marker-offset-left:0px; --marker-width:75.4688px; --marker-height:44px;">
            @foreach($this->printout->fontSizes as $fontSize)
                <label class="multi-switcher__btn below-sm:px-15 @if($fontSize->id == $this->textModal->font_size) active @endif" data-menu-link="">
                    <input
                        type="radio"
                        wire:model="textModal.font_size"
                        value="{{$fontSize->id}}"
                        name="size"
                        class="radio-sr-only"
                        @if($fontSize->id === $this->textModal->font_size) checked="" @endif
                    >
                    {{$fontSize->title}}
                </label>
{{--                <div class="multi-switcher__marker"></div>--}}
            @endforeach

        </div>
    </div>
</div>
