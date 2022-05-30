<div class="covers-layouts" id="covers-layouts">

    <div class="text-sm mb-8">Выберите макет разворота</div>

    <ul class="grid grid-cols-fill-min-100 gap-8 lg:gap-16">
        @foreach($this->defineLayouts() as $layout)
            <li
                @if(@$this->activeSpread->layout_id === @$layout->id)
                    class="btn-base layout-preview active"
                @else
                    class="btn-base layout-preview"
                wire:click="onSetSpreadLayout( {{$layout->id}}, {{$layout->template_id}})"
                @endif
            >
                <button style="--img: url({{asset('/storage/'.$layout->icon)}})"></button>
            </li>
        @endforeach
    </ul>
</div>
