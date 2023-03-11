<div class="covers-layouts" id="covers-layouts">

    <div class="text-sm mb-8">Выберите макет разворота</div>

    <ul class="grid grid-cols-fill-min-100 gap-8 lg:gap-16">
{{--        @foreach($this->printout->layouts as $layout)--}}
{{--            @dump($layout->toArray())--}}
{{--            @if($layout->template_id === $this->printout->spread->template_id)--}}

                @foreach($this->printout->layouts()->where('template_id', $this->template)->get() as $layout)


                @if(@$this->printout->spread->layout_id === @$layout->id)
                    <li>
                        <button class="btn-base layout-preview active" style="--img: url({{asset('/storage/'.$layout->icon)}})"></button>
                    </li>
                @else
                    <li wire:click="onSetSpreadLayout( {{$layout->id}}, {{$layout->template_id}})">
                        <button class="btn-base layout-preview" style="--img: url({{asset('/storage/'.$layout->icon)}})"></button>
                    </li>
                @endif
        @endforeach

{{--            @endif--}}
{{--        @endforeach--}}
    </ul>
</div>
