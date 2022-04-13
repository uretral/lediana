<div class="photo-gallery">
    <div class="photo-gallery__name">#lediana</div>

    <ul class="photo-gallery__list">
            @isset($output->img_1) <li><img src="{{asset('storage/'.$output->img_1)}}" alt="gallery image"/></li> @endisset
            @isset($output->img_2) <li><img src="{{asset('storage/'.$output->img_2)}}" alt="gallery image"/></li> @endisset
            @isset($output->img_3) <li><img src="{{asset('storage/'.$output->img_3)}}" alt="gallery image"/></li> @endisset
            @isset($output->img_4) <li><img src="{{asset('storage/'.$output->img_4)}}" alt="gallery image"/></li> @endisset
            @isset($output->img_5) <li><img src="{{asset('storage/'.$output->img_5)}}" alt="gallery image"/></li> @endisset
            @isset($output->img_6) <li><img src="{{asset('storage/'.$output->img_6)}}" alt="gallery image"/></li> @endisset
            @isset($output->img_7) <li><img src="{{asset('storage/'.$output->img_7)}}" alt="gallery image"/></li> @endisset
    </ul>

    <div class="container">
        <div
            class="overflow-x-auto overflow-y-hidden disable-scrollbars px-container -mx-container mt-60 lg:mx-0 lg:p-0 md:w-full lg:w-auto">
            <div class="multi-switcher multi-switcher--primary w-max">
                <div class="multi-switcher__inner" data-menu='{"mode": "radio"}'>

                    @if(count($galleries) > 1)
                        @foreach($galleries as $key => $gallery)
                            <label class="multi-switcher__btn @if((int)$current === $key) active  @endif" data-menu-link >
                                <input type="radio" name="switcher-type" class="radio-sr-only" wire:model="current" wire:click="show({{$key}})" value="{{$key}}" @if((int)$current === $key) checked @endif />
                                {{@$gallery->title}}
                            </label>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
