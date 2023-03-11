<div class="photo crop-container  {{\EditorStyles::cornersClass($photo)}}" style="{{\EditorStyles::photoStyle($photo)}}">
    <div

        @dragover="subjectOnEnter"
        @drop="onPhotoDrop"
        @click="onPhotoDrop"
        class="crop-subject "
        data-spread="{{$spread->spread_nr}}"
        data-layout="{{$photo->layout_id}}"
        data-photo="{{$photo->id}}"
        id="{{$photo->id}}-{{$spread->spread_nr}}-{{$photo->layout_id}}"
    >
        @if($pic = $this->getPhotoHtml($spread,$photo))
            <div class="crop-panel">
                <button  @click="onResetCropper" class="btn-base btn-action" aria-label="Закрыть" data-close-modal="">&#9842;</button>
                <button  @click="onPhotoRemove({{$pic->id}})" class="btn-base btn-action" aria-label="Закрыть" data-close-modal="">&timesb;</button>
            </div>

            {!! $pic->html !!}
        @endif

    </div>

</div>
