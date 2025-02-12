<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <script type="module">
        if (!("anchorName" in document.documentElement.style)) {
            import("https://unpkg.com/@oddbird/css-anchor-positioning");
        }
    </script>
</head>

<body>
    {{-- @include('partials.navbar.navbar') --}}
    <livewire:ui.navbar.navbar />
    {{ $slot }}
    @livewireScripts
</body>

</html>
