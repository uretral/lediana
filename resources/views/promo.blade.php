@extends('tpl.default')
@section('mainContent')
    <div class="main-wrapper">
        @include('partials.info', ['info' => @$page->info, 'price' => @$page->price_from])

        <div class="about">
            @include('partials.about',['about' => @$page->about])
        </div>

        @isset($page->calculator)
            <div class="mt-50 lg:mt-100 xl:mt-150">
                @livewire('formats.'.$page->livewire, ['product' => $page->calculator, 'slug' => $page->slug, 'type' => 'promo'])
            </div>
        @endisset

        @isset($page->crossLink)
            @include('partials.cross',['cross_links' => @$page->crossLink])
        @endisset

        @if(count($page->galleryTitle))
            <livewire:gallery :galleries="$page->galleryTitle"/>
        @endif

        <div class="service-reviews" data-slider="reviews">
            <livewire:reviews :page="$page->id" btn="btn--white"/>
        </div>

<!-- todo:uretral calculator -->
{{--        @isset($page->calculator)
            <livewire:calculator :product="$page->calculator"/>
        @endisset--}}

        @if($page->creation->title)
            @include('partials.creations',['creation' => $page->creation])
        @endif

        @isset($page->gift->title)
            @include('partials.gift',['gift' => $page->gift])
        @endif

        @if(count($page->advantage) != 0)
            @include('partials.advantage',['gifts' => $page->advantage,'title' => $page->advantages_title])
        @endif

        @include('partials.pay-and-ship')

        @isset($page->promotion)
            <div class="home-footer home-footer--dark-top">
                @include('partials.promotion', ['promotion' => @$page->promotion])
            </div>
        @endisset

    </div>


@endsection
