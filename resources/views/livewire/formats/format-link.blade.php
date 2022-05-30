@if($item = $sizes->where('sizes',$size)->first())

    <li class="size" style="--w: {{$item->width}}; --h: {{$item->height}}; --max-w: {{$item->rem}}rem">
        <a  wire:click="goToEditor( {{ $item }} )"  href="javascript:"  class="size__inner">
            <span>{{$item->sizes}}</span>
        </a>
    </li>

@endif
