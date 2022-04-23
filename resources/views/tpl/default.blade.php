<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{@$page->title}}</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css?v=1.1')}}"/>
    @livewireStyles

    {{--    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/')}}/favicons/apple-touch-icon.png" />--}}
    {{--    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/')}}/favicons/favicon-32x32.png" />--}}
    {{--    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/')}}/favicons/favicon-16x16.png" />--}}
    {{--    <link rel="manifest" href="{{asset('assets/')}}/favicons/site.webmanifest" />--}}
    {{--    <link rel="mask-icon" href="{{asset('assets/')}}/favicons/safari-pinned-tab.svg" color="#5bbad5" />--}}
    <meta name="msapplication-TileColor" content="#da532c"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta name="description" content="{{@$page->meta_description}}" />
</head>
<body>
{{--@dump($menu,$communications,$socials)--}}

@include('partials.tpl.header')

@yield('mainContent')

@include('partials.tpl.footer')

<script src="{{asset('assets/js/main.js')}}"></script>

@include('partials.modals')

@livewireScripts
<script>
    var maskedInputs = document.querySelectorAll("[data-mask]");

    for (var index = 0; index < maskedInputs.length; index++) {
        maskedInputs[index].addEventListener('input', maskInput);
    }

    function maskInput() {
        var input = this;
        var mask = input.dataset.mask;
        var value = input.value;
        var literalPattern = /[0\*]/;
        var numberPattern = /[0-9]/;
        var newValue = "";
        try {
            var maskLength = mask.length;
            var valueIndex = 0;
            var maskIndex = 0;

            for (; maskIndex < maskLength;) {
                if (maskIndex >= value.length) break;

                if (mask[maskIndex] === "0" && value[valueIndex].match(numberPattern) === null) break;

                // Found a literal
                while (mask[maskIndex].match(literalPattern) === null) {
                    if (value[valueIndex] === mask[maskIndex]) break;
                    newValue += mask[maskIndex++];
                }
                newValue += value[valueIndex++];
                maskIndex++;
            }

            input.value = newValue;
        } catch (e) {
            console.log(e);
        }
    }
</script>
</body>
</html>


