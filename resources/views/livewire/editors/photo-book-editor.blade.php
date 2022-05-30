<div class="main-wrapper bg-divider">
{{--    <div class="logL">
        @dump($printout->toArray())
        @dump(@$this->tmpPhotos[0])
        @dump(@$this->photos[0])
        @dump($this->photos)
        @dump($this->layout)
        @dump($this->textModal ? $this->textModal->toArray() : '')
        @dump($this->printout->photos()->count())

    </div>
    <div class="log">
        @dump('t '.$diff.' sec')
        @dump('m '.($memoryDiff*1024).' kb')
        @dump('activeSpread',$this->activeSpread ? $this->activeSpread->toArray() : '' )
        @dump('$cover',$this->cover ? $this->cover->toArray() : '' )
        @dump('oddSpread',$this->oddSpread ? $this->oddSpread->toArray() : '' )
        @dump('evenSpread',$this->evenSpread ? $this->evenSpread->toArray() : '' )
    </div>--}}

    <div class="mt-32 sm:my-64">
        <div class="container">
            <div class="flex items-center mb-8 sm:mb-16">

                <h2 class="text-xl sm:text-2xl md:text-3xl font-black -translate-y-5">Фотокнига</h2>
                <x-editor.select-format/>
                <x-editor.save-delete-block/>


            </div>
            <x-editor.spread-buttons/>

            <div x-data="cropper" class="grid lg:grid-cols-[1fr,26rem] gap-20 xl:gap-40">
                <x-editor.spread-editor wire:key="spread-editor"/>
                <x-editor.photo-uploader/>
            </div>
        </div>
    </div>

    <x-editor.text-editor-modal :open="$this->textModalOpen" :textModal="$this->textModal"/>

    <div class="bg-black pt-48 lg:pt-32 pb-50 text-white" x-data="{open:false}">

        <div class="container" :class="open ? 'cover-materials-active' : ''" @click.outside="open = false">

            <x-editor.layout-manager>
                <button
                    class="btn-base text-left field field--type-select field--sm field--rounded-sm cover-materials-toggler"
                    data-toggle="cover-materials" :class="open ? 'active' : ''"
                    x-on:click="open = !open">
                    Материал обложки
                </button>
            </x-editor.layout-manager>

            <div class="cover-materials-list toggle-init " :class="open ? 'active' : ''">
                <x-editor.layout-cover-material :spread="$this->printout->spread"/>
            </div>
            @if($printout->current_spread_nr)
                <x-editor.layout-spread-thumbs
                    :spread="$printout->current_spread_nr % 2 ? $this->oddSpread : $this->evenSpread"/>
            @else
                <x-editor.layout-cover-thumbs/>
            @endif

        </div>
    </div>

    <div class="fixed inset-x-0 bottom-0 py-8 lg:hidden text-black bg-primary-light z-10">
        <div class="container flex items-center justify-center">
            <div class="text-[2.2rem] font-bold mr-16">1890 ₽</div>
            <button class="btn btn--md btn--primary">В корзину</button>
        </div>
    </div>

</div>
<script>

</script>
<script>

</script>
{{--

<script>


   document.addEventListener('DOMContentLoaded', function (){
       console.log('fffffffffffff');
       let subject = document.querySelector('.crop-subject');
       subject.onclick = function (el) {
           console.log('ddd', el);

       }

       var croppicContainerPreloadOptions = {
           uploadUrl: 'img_save_to_file.php',
           cropUrl: 'img_crop_to_file.php',
           loadPicture: '/js/croppic/depositphotos_106625060-stock-photo-young-beautiful-sexy-girl-blond.jpg',
           enableMousescroll: true,
           loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
       }
       // var cropContainerPreload = new Croppic('photo21', croppicContainerPreloadOptions);
   })




</script>
--}}
