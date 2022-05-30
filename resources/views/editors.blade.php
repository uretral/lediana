@extends('tpl.default')
@section('mainContent')
    <livewire:editors.editor :printout_id="$printout_id"/>
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
    <script src="{{asset('js/editor.js')}}"></script>

@endpush
