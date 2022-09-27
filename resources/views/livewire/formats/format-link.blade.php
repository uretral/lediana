@if($item = $sizes->where('sizes',$size)->first())

    <li class="size" style="--w: {{$item->width}}; --h: {{$item->height}}; --max-w: {{$item->rem}}rem">
        <a  wire:click="goToEditor( {{ $item }} )"  href="javascript:"  class="size__inner">
            <span>{!! str_replace('.', ',', $item->sizes) !!}</span>
        </a>
        @isset($hint)
            <span class="absolute inset-x-0 -bottom-25 sm:-bottom-30 text-tiny sm:text-base">{{$hint}}</span>
        @endisset
    </li>

@endif
