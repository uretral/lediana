<div class="photo crop-container tblr" style="top: 0; left: 0; right: 0; bottom: 0; z-index: 0">
    <div

        @dragover="subjectOnEnter"
        @drop="onPhotoDrop"
        @click="onPhotoDrop"
        class="crop-subject "
        data-spread="{{$spread->spread_nr}}"
        data-layout="169"
{{--        data-photo="{{$photo->id}}"--}}
        id="{{$spread->spread_nr}}-169"
        data-spread-id="{{$spread->id}}"
    >
        @if($pic = $this->getPhotoBgHtml($spread))
            {!! $pic->html !!}
            <button class="crop-restart {{$side}}" @click.stop="onResetCropper"></button>
            <button class="crop-delete {{$side}}" @click.stop="onDeleteCropper"></button>
        @endif

    </div>

</div>
