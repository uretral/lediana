@push('scripts-after')
    <script src="{{asset('js/photo.book.editor.js')}}"></script>
@endpush
<div class="main-wrapper bg-divider">
    <div class="wire-loading" wire:loading>
{{--        <div>--}}
{{--            <div class="lds-facebook"><div></div><div></div><div></div></div>--}}
{{--        </div>--}}

    </div>

    <div class="logL">
{{--        @dd($this->buttonSpreads[0]);--}}
{{--        @dump($printout->toArray())--}}
{{--        @dump(($this->oddSpread->toArray()))--}}
{{--        @dump(($this->evenSpread->toArray()))--}}
    </div>

    <div class="mt-32 sm:my-64">
        <div class="container">
            <div class="flex items-center mb-8 sm:mb-16">

                <h2 class="text-xl sm:text-2xl md:text-3xl font-black -translate-y-5">Фотокнига</h2>
{{-- format --}}
                <x-editor.select-format/>
{{-- delete-block --}}
                <x-editor.save-delete-block/>

            </div>
{{--spread-buttons--}}
            <x-editor.spread-buttons/>

            <div x-data="cropper" class="grid lg:grid-cols-[1fr,26rem] gap-20 xl:gap-40">
{{--spread-editor--}}
                <x-editor.spread-editor wire:key="spread-editor"/>
{{--photo-uploader--}}
                <x-editor.photo-uploader/>
            </div>
        </div>
    </div>

{{--text-editor-modal--}}
    <x-editor.text-editor-modal :open="$this->textModalOpen" :textModal="$this->textModal"/>
    <x-editor.photo-editor-modal :open="$this->croppreModal" />

    <div class="bg-black pt-48 lg:pt-32 pb-50 text-white" x-data="{open:false}">

        <div class="container" :class="open ? 'cover-materials-active' : ''" @click.outside="open = false">
{{--Все обложки--}}
            <x-editor.layout-manager>
                <button
                    class="btn-base text-left field field--type-select field--sm field--rounded-sm cover-materials-toggler"
                    data-toggle="cover-materials" :class="open ? 'active' : ''"
                    x-on:click="open = !open">
                    Материал обложки
                </button>
            </x-editor.layout-manager>
{{--Материал обложки--}}
            <div class="cover-materials-list toggle-init " :class="open ? 'active' : ''">
                <x-editor.layout-cover-material :spread="$this->printout->spread"/>
            </div>

            @if($printout->current_spread_nr)
{{--Выберите макет разворота--}}
                <x-editor.layout-spread-thumbs :spread="$printout->current_spread_nr % 2 ? $this->oddSpread : $this->evenSpread"/>
            @else
{{--Выберите макет обложки--}}
                <x-editor.layout-cover-thumbs/>
            @endif

        </div>
    </div>

    <div class="fixed inset-x-0 bottom-0 py-8 lg:hidden text-black bg-primary-light z-10">
        <div class="container flex items-center justify-center">
            <div class="text-[2.2rem] font-bold mr-16">{{$this->price}} ₽</div>
            <button class="btn btn--md btn--primary" wire:click="goToCart">В корзину</button>
        </div>
    </div>

</div>
