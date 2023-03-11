@push('scripts-after')
    <script src="{{asset('js/photo.editor.js')}}"></script>
@endpush

<div class="main-wrapper bg-divider">
    <div class="logL">
        @dump($printout->toArray())
    </div>

    <div class="mt-32 sm:my-64">
        <div class="container">
            <div class="flex items-center mb-8 sm:mb-16">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-black -translate-y-5">Фотографии</h2>

                <x-editor.select-format/>

                <button class="below-lg:hidden btn btn--md btn--black btn--text" wire:click="changeOrientation()">
                    <svg aria-hidden="true" class="wh-24 mr-8 fill-current">
                        <use href="{{asset('assets/svg/svg.svg#disorient')}}"></use>
                    </svg>
                    Сменить ориентацию
                </button>

                <x-editor.save-delete-block/>

            </div>

            <x-editor.spread-single-button/>
{{-- ROW 3 --}}
            <div class="grid lg:grid-cols-[1fr,26rem] gap-20 xl:gap-40" x-data="cropper">
                {{--spread-editor--}}
                <x-editor.single-spread-editor :arrows="true"/>

                <div>
                    {{--photo-uploader--}}
                    <x-editor.single-photo-uploader/>

                    <div class="hidden lg:flex items-center justify-center bg-white px-16 py-24 rounded mt-32">
                        <div
                            class="text-lg font-bold text-black mr-16"> {{--{{$this->printout->cost}}--}} {{$this->price}}
                            ₽
                        </div>
                        <button class="btn btn--md btn--primary" wire:click="goToCart">В корзину</button>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="fixed inset-x-0 bottom-0 py-8 lg:hidden text-black bg-primary-light z-10">
        <div class="container flex items-center justify-center">
            <div class="text-[2.2rem] font-bold mr-16">{{$this->price}} ₽</div>
            <button class="btn btn--md btn--primary" wire:click="goToCart">В корзину</button>
        </div>
    </div>
</div>
