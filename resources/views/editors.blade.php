@extends('tpl.default')
@section('mainContent')
    @switch($service->product_id)
        @case(1)
            <livewire:editors.photo-book-editor :printout_id="$service->id"/>
            @break
        @case(2)
            Дизайнерские фотокниги
            @break
        @case(3)
            <livewire:editors.photo-editor  :printout_id="$service->id"/>
            @break
        @case(4)
            <livewire:editors.photo-canvas-editor  :printout_id="$service->id"/>
            @break
        @case(5)
            Фотокубики
            @break
        @case(6)
            Подарочная карта
            @break
        @case(7)
            Открытки
            @break
        @case(8)
            Премиум фотокниги
            @break
        @case(9)
            Фотомагниты
            @break
    @endswitch
@endsection
@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{asset('css/fonts/editor-fonts.css')}}" rel="stylesheet">
    <link href="{{asset('css/croppic/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/croppic/croppic.css')}}" rel="stylesheet">
@endpush
@push('scripts')
    <script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="{{asset('js/croppic/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('js/croppic/croppic.js')}}"></script>
@endpush
