@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}  style="color: red">
        <div class="font-medium text-red-600">
            {{ __('Что то пошло не так!') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
