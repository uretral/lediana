<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{@$page->title}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css?v=1.1')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/helper.css')}}"/>
    @stack('styles')
    @inertiaHead

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/')}}/favicons/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/')}}/favicons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/')}}/favicons/favicon-16x16.png"/>
    <link rel="mask-icon" href="{{asset('assets/')}}/favicons/safari-pinned-tab.svg" color="#5bbad5"/>

    <meta name="msapplication-TileColor" content="#da532c"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta name="description" content="{{@$page->meta_description}}"/>
    @stack('scripts')
    @stack('scripts-after')
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>

@include('partials.tpl.header')

@yield('mainContent')

@include('partials.tpl.footer')

<script src="{{asset('assets/js/main.js')}}"></script>

@include('partials.modals')

<script src="{{asset('js/script.js')}}"></script>

@stack('scripts-body')

</body>
</html>


