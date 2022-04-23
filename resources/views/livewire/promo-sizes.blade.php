<div class="mt-50 lg:mt-100 xl:mt-150">
    <div class="container">
        <h2 class="text-xl sm:text-2xl mb-16 font-bold">Доступные размеры</h2>
        <div class="text-mob-lg md:text-lg prose">
            <p>Все размеры указаны в сантиметрах</p>
        </div>
{{--        @dump($sizes->groupBy('format.title'))
        @dump($byFormat)--}}
        @if($byFormat)
            @foreach($sizes->groupBy('format.title') as $key => $items)
                @if(($cnt++ % 2) == 0)
                    <div class="avaliable-sizes-wrapper ">
                        <div class="avaliable-sizes-list-wrapper ">
                            <ul class="avaliable-sizes-list">
                                @foreach($items as $item )
                                    <li class="size size--{{$item->size->width}}-{{$item->size->height}}">
                                        <a href="/photobooks-editor.html" class="size__inner">
                                            <span>{{$item->size->width}}×{{$item->size->height}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="avaliable-sizes-title">
                                <span>{{$key}}</span>
                            </div>
                        </div>
                        @else
                        <div class="avaliable-sizes-list-wrapper ">
                            <ul class="avaliable-sizes-list">
                                @foreach($items as $item )
                                    <li class="size size--{{$item->size->width}}-{{$item->size->height}}">
                                        <a href="/photobooks-editor.html" class="size__inner">
                                            <span>{{$item->size->width}}×{{$item->size->height}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="avaliable-sizes-title">
                                <span>{{$key}}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else

            <ul class="flex items-end flex-wrap gap-y-65 gap-x-20 lg:gap-x-40 ">
                <li class="size below-sm:size-w-devider--1.2" style="--w: 10; --h: 10; --max-w: 10rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>10×10</span>
                    </a>
                    <span class="absolute inset-x-0 -bottom-25 sm:-bottom-30 text-tiny sm:text-base">Инстаграм</span>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 7.9; --h: 7.9; --max-w: 9rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>7,9×7,9</span>
                    </a>
                    <span class="absolute inset-x-0 -bottom-25 sm:-bottom-30 text-tiny sm:text-base">Полароид</span>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 10.5; --h: 15.2; --max-w: 10.5rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>10,5×15,2</span>
                    </a>
                </li>
                <!--                     <div class="w-full flex sm:contents items-end gap-x-20">-->
                <li class="size below-sm:size-w-devider--1.2" style="--w: 15.2; --h: 21.6; --max-w: 15.2rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>15,2×21,6</span>
                    </a>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 20.3; --h: 30.5; --max-w: 20.3rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>20.3×30,5</span>
                    </a>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 21; --h: 30.5; --max-w: 20.5rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>21×30,5</span>
                    </a>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 30.5; --h: 40.6; --max-w: 30.5rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>30,5×40,6</span>
                    </a>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 30.5; --h: 42; --max-w: 30.5rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>30,5×42</span>
                    </a>
                </li>
                <li class="size below-sm:size-w-devider--1.2" style="--w: 30.5; --h: 45.7; --max-w: 30.5rem">
                    <a href="/photos-editor.html" class="size__inner">
                        <span>30,5×45,7</span>
                    </a>
                </li>
                <!--                     </div>-->
            </ul>
        @endif

    </div>
</div>
