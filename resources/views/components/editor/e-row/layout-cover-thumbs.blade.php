<div class="covers-layouts" id="covers-layouts">

        <div class="text-sm mb-8">Выберите макет обложки </div>
        <ul class="grid grid-cols-fill-min-100 gap-8 lg:gap-16">
            @foreach($this->layoutCoverThumbs as $layout)
                @if($layout)
                <li
                    wire:click="setCoverLayout( {{$layout->id}}, {{$this->printout->spread->id}} )">
                    <button
                        class="btn-base layout-preview @if($layout->id === $this->printout->spread->layout_id) active @endif "
                        style="--img: url({{asset('/storage/'.$layout->icon)}})"
                    ></button>
                </li>
                @endif
            @endforeach
        </ul>

</div>
