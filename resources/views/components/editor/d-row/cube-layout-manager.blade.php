
<div class="bg-black pt-48 lg:pt-32 pb-50 text-white">
    <div class="container">
        @if(in_array($this->printout->spread_view, $this->doubleSpreadKeys))
            <div class="text-sm text-center sm:text-left mb-8">Выберите макет разворота</div>
        @endif

        <div class="flex max-w-190 mx-auto sm:max-w-none">

            @if(in_array($this->printout->spread_view, $this->doubleSpreadKeys))
                <ul class="grid grid-cols-fill-min-190 gap-8 lg:gap-16 flex-grow">
                    <li>
                        <button class="btn-base layout-preview @if($this->oddSpread->is_double) active @endif"
                                style="--img: url({{asset('/assets/img/cube/cube-style-1.svg')}}); padding-bottom: calc(100 / 193 * 100%)"
                                wire:click="setDouble"
                        ></button>
                    </li>
                    <li>
                        <button class="btn-base layout-preview @if(!$this->oddSpread->is_double) active @endif"
                                style="--img: url({{asset('/assets/img/cube/cube-style-2.svg')}}); padding-bottom: calc(100 / 193 * 100%)"
                                wire:click="unsetDouble"
                        ></button>
                    </li>
                </ul>
            @endif

            <div class="hidden lg:flex items-center ml-auto">
                <div class="text-lg font-bold text-white mr-16">{{$this->price}} ₽</div>
                <button class="btn btn--md btn--primary" wire:click="goToCart" >В корзину</button>
            </div>
        </div>
    </div>
</div>
