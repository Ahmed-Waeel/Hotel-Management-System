@props([
    'title' => null,
])

@php
    $title = (isset($title) ? $title . ' | ' : '') . __(env('APP_NAME'));
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="title" content="{{ $title }}" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Ahmed Wael" />

    <title>{{ $title }}</title>

    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />

    {{-- Tabler Core --}}
    <link rel="stylesheet" href="{{ asset("/vendor/tabler/tabler.min.css") }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/tabler/tabler-vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fontawesome/css/all.min.css') }}" />

    {{-- Plugins --}}
    <link rel="stylesheet" href="{{ asset('/vendor/jquery-confirm/jquery-confirm.min.css') }}" />

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}" />

    @livewireStyles

    @stack('styles')
</head>

<body {{ $attributes->merge(['class' => 'antialiased']) }}>
    @stack('pre-content')

    {{ $slot }}

    @stack('templates')

    {{-- Core --}}
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/vendor/tabler/tabler.min.js') }}"></script>
    <script src="{{ asset('/assets/js/functions.js') }}"></script>

    {{-- Plugins --}}
    <script src="{{ asset('/vendor/jquery-confirm/jquery-confirm.min.js') }}"></script>

    {{-- Custom Scripts --}}
    <script src="{{ asset('/assets/js/app.js') }}"></script>

    @livewireScripts

    @stack('scripts')
</body>

</html>
