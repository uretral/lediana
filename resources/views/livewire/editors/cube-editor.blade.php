@push('scripts-after')
    <script src="{{asset('js/photo.editor.js')}}"></script>
@endpush

<div class="main-wrapper bg-divider">

    <div class="wire-loading trans" wire:loading>
        <div>
            <div class="lds-facebook">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

    </div>



    <div class="mt-32 sm:my-64">
        <div class="container">
            <div class="flex items-center mb-8 sm:mb-16">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-black -translate-y-5">Фотокубик</h2>
                <x-editor.a-row.select-format/>
                <x-editor.a-row.save-delete-block/>
            </div>

            <div class="lg:grid lg:grid-cols-[1fr,26rem] gap-20 xl:gap-40"  x-data="cropper">
                <div>
                    <x-editor.b-row.spreads-buttons-cube/>
                    <x-editor.c-row.spreads.cube-spread-editor/>
                </div>
                <div>
                    <button class="btn-base w-full bg-primary-light rounded p-16 lg:mb-32 relative text-left pl-130 lg:pl-95 lg:text-[1.5rem] h-120 group" wire:click="modalView(true)">
                        <img src="/assets/img/cube.png" class="wh-120 lg:wh-90 object-contain object-center absolute left-10 lg:left-5 top-0 lg:top-5" alt="" />
                        <span class="font-bold"
                        >Узнайте подробнее о&nbsp;конструкции<br />
                           фотокубика</span
                        >
                        <div class="wh-48 rounded-full bg-primary grid place-content-center ml-auto -mt-30 lg:-mt-20 transition group-hover:bg-black">
                            <svg aria-hidden="true" class="wh-18"><use href="/assets/svg/svg.svg#play"></use></svg>
                        </div>
                    </button>
                    <x-editor.c-row.single-photo-uploader/>
                </div>
            </div>
        </div>
    </div>

    <x-editor.d-row.cube-layout-manager/>

    <div class="fixed inset-x-0 bottom-0 py-8 lg:hidden text-black bg-primary-light z-10">
        <div class="container flex items-center justify-center">
            <div class="text-[2.2rem] font-bold mr-16">1890 ₽</div>
            <button class="btn btn--md btn--primary">В корзину</button>
        </div>
    </div>


    <div class="modal modal--default" @if(!$this->modal) hidden @endif data-modal id="cube-video">
        <div class="modal-content w-900 xxl:w-950 below-sm:rounded-sm" data-modal-content>
            <button class="btn-base btn-close modal-close below-sm:top-10 below-sm:right-10" aria-label="Закрыть" wire:click="modalView()">
                <svg aria-hidden="true"><use href="/assets/svg/svg.svg#close"></use></svg>
            </button>
            <div class="px-10 sm:px-60 pt-45 sm:pt-30 pb-60 xxl:pb-100">
                <div class="video-wrapper bg-divider mb-16 sm:mb-32">
                    <button class="btn btn--primary btn--md btn--icon center">
                        <svg aria-hidden="true" class="wh-18"><use href="/assets/svg/svg.svg#play"></use></svg>
                    </button>
                </div>
                <div class="text-mob-2xl sm:text-xl xxl:text-2xl font-bold">Узнайте подробнее о конструкции фотокубика</div>
                <button class="btn btn--md btn--primary mt-16 sm:mt-24" wire:click="modalView()">Перейти в редактор</button>
            </div>
        </div>
    </div>


</div>
