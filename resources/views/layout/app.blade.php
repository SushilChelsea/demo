<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- <header>This is a header</header> --}}
    <section style="margin-top: 50px">
        @yield('content')
    </section>
    {{-- <footer>
        <p>This is a footer</p>
    </footer> --}}
</body>

</html>