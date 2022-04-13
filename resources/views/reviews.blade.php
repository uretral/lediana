@extends('tpl.default')
@section('mainContent')

    <div class="main-wrapper bg-divider">
        <div class="my-64">
            <livewire:reviews/>
        </div>
        @isset($page->promotion)
            <div class="home-footer home-footer--dark-top">
                @include('partials.promotion', ['promotion' => @$page->promotion])
            </div>
        @endisset
    </div>

@endsection


