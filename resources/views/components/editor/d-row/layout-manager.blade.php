<div class="flex flex-wrap items-center mb-16">

    @if($this->printout->current_spread_nr)

        @foreach($this->layoutTemplates() as $template)
            <div class="min-w-100 mr-2 lg:mr-24">
                <button wire:click="setTemplateProperty( {{$template->id}} )" class="btn btn--sm cover-materials-hide
                    @if($this->template === $template->id) btn--primary @else opacity-50 @endif">
                    {{$template->title}}
                </button>
            </div>
        @endforeach

    @else

        @foreach($this->printout->layout_templates->where('id',1) as $tpl)
            <button class="btn btn--sm btn--primary cover-materials-hide">Все обложки</button>
        @endforeach

        <div class="min-w-190 ml-10 lg:ml-24">{{$slot}}</div>

    @endif


    <div
        class="overflow-x-auto overflow-y-hidden disable-scrollbars px-container -mx-container mt-16 lg:m-0 lg:p-0 md:w-full lg:w-auto cover-materials-hide">
        <div class="multi-switcher multi-switcher--sm multi-switcher--dark lg:ml-30 w-max">
            <div class="multi-switcher__inner">
                @foreach($this->spreadBg() as $bg)
                    <label class="multi-switcher__btn  @if($bg->id == @$this->printout->spread->page_color) active @else cursor-pointer @endif"
                           wire:click="onSetBackground({{$bg->id}})">
                        {{$bg->title}}
                    </label>
                @endforeach
                <div class="multi-switcher__marker"></div>
            </div>
        </div>
    </div>
    <div class="hidden lg:flex items-center ml-auto cover-materials-hide">
        <div class="text-lg font-bold text-white mr-16">{{$this->price}} ₽</div>
        <button class="btn btn--md btn--primary" wire:click="goToCart" >В корзину</button>
    </div>
</div>
