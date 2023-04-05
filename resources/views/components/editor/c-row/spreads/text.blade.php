<div class="texts"
     wire:click="onTextEdit({{$spread->id}}, {{$text->layout_id}}, {{$text->id}})"
     id="text-{{$text->id}}"
     style="{{\EditorStyles::photoStyle($text)}}"
     wire:key="{{$spread->id}}-{{$text->layout_id}}-{{$text->id}}"
>
        {!! $this->getTextHtml($spread,$text) !!}
</div>



