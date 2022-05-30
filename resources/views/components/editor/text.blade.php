<div class="texts"
     wire:click="onTextEdit({{$spread->spread_nr}}, {{$text->layout_id}}, {{$text->id}})"
     id="text-{{$text->id}}"
     style="{{\EditorStyles::photoStyle($text)}}"
     wire:key="{{$spread->spread_nr}}-{{$text->layout_id}}-{{$text->id}}"
>
        {!! $this->getTextHtml($spread,$text) !!}
</div>



