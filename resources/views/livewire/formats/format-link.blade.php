@if($itemSize = $sizes->where('sizes',$size)->first())

    <li class="size" style="--w: {{$itemSize->width}}; --h: {{$itemSize->height}}; --max-w: {{$itemSize->rem}}rem">
        <a  wire:click="handle( {{ $itemSize }} )"  href="javascript:"  class="size__inner">
            <span>{!! str_replace('.', ',', $itemSize->sizes) !!}</span>
        </a>
        @isset($hint)
            <span class="absolute inset-x-0 -bottom-25 sm:-bottom-30 text-tiny sm:text-base">{{$hint}}</span>
        @endisset
    </li>

@endif
