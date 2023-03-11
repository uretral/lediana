@push('scripts-after')
    <script src="{{asset('js/photo.editor.js')}}"></script>
@endpush
<div class="main-wrapper bg-divider">
{{--    <div class="logL">
        @dump($printout->toArray())
    </div>--}}
    <div class="mt-32 sm:my-64">
        <div class="container">
            <div class="flex items-center mb-8 sm:mb-16">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-black -translate-y-5">Холст</h2>
                {{--//--}}
                <x-editor.select-format/>
                {{--//--}}
                <button class="below-lg:hidden btn btn--md btn--black btn--text" wire:click="changeOrientation()">
                    <svg aria-hidden="true" class="wh-24 mr-8 fill-current">
                        <use href="{{asset('assets/svg/svg.svg#disorient')}}"></use>
                    </svg>
                    Сменить ориентацию
                </button>
                {{--//--}}
                <x-editor.save-delete-block/>
            </div>
{{-- ROW 2--}}
{{-- ROW 3--}}
            <div class="grid lg:grid-cols-[1fr,26rem] gap-20 xl:gap-40 mt-30 sm:mt-50" x-data="cropper">

                {{--spread-editor--}}
                <x-editor.single-spread-editor :arrows="false"/>

                <div>
                    {{--photo-uploader--}}
                    <x-editor.single-photo-uploader/>


                    <ul class="grid grid-cols-1 gap-32 my-32 pb-20 lg:pb-0">
                        @foreach($this->printout->size->attributes as $attribute)
                            <li wire:key="attribute-{{$attribute->id}}">
                                <div class="flex">
                                    <label class="block wh-80 relative rounded-sm overflow-hidden flex-shrink-0 cursor-pointer">
                                        <input type="checkbox" value="{{$attribute->id}}"
                                               class="checkbox absolute top-8 right-8"
{{--                                               @if(in_array($attribute->id, $this->printout->spread->attributes)) checked  @endif--}}
                                               wire:model="attributes" />
                                        <img src="{{asset('storage/'.$attribute->attributes->image)}}" class="image-full" alt="{{$attribute->attributes->title}}" />
                                    </label>
                                    <div class="pl-8 pt-8">
                                        <div class="flex items-center">
                                            {{$attribute->attributes->title}}
                                            <button class="btn-base wh-24 flex-shrink-0 rounded bg-primary hover:bg-black text-sm text-white ml-8 self-start">?</button>
                                        </div>
                                        <div class="font-bold">+ {{$attribute->price}} ₽</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                    <div class="hidden lg:flex items-center justify-center bg-white px-16 py-24 rounded mt-32">
                        <div class="text-lg font-bold text-black mr-16">{{$this->price}} ₽</div>
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



