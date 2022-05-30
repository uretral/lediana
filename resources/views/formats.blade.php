@extends('tpl.default')
@section('mainContent')
    <div class="main-wrapper bg-divider">
        <div class="my-32 sm:my-64">
            @livewire('formats.'.$page->livewire, ['product' => $page->calculator, 'slug' => $page->slug, 'type' => 'format'])
        </div>
    </div>
@endsection

