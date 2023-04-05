<div class="photo crop-container  {{\EditorStyles::cornersClass($photo)}}" style="{{\EditorStyles::photoStyle($photo, $z??0)}}">
    <div

        @dragover="subjectOnEnter"
        @drop="onPhotoDrop"
        @click="onPhotoDrop"
        class="crop-subject "
        data-spread="{{$spread->spread_nr}}"
        data-layout="{{$photo->layout_id}}"
        data-photo="{{$photo->id}}"
        id="{{$photo->id}}-{{$spread->id}}-bg"
        data-spread-id="{{$spread->id}}"
    >
        @if($pic = $this->getPhotoHtml($spread,$photo))
            {!! $pic->html !!}
            <button class="crop-restart" @click.stop="onResetCropper"></button>
            <button class="crop-delete" @click.stop="onDeleteCropper"></button>
        @endif

    </div>

</div>
