<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'SP-Shop' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
    <!-- Directive: -->
    @livewireStyles

    <!-- Produces: -->
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false" defer></script>

</head>

<body>
    <div id="app">
        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
        @include('sweetalert::alert')
        @livewireScripts
        <script>
            window.addEventListener('closeModal', event => {
                $("#modalForm").modal('hide');
            })
        </script>
        @stack('scripts')
    </div>
</body>
<footer>
    <div class="text-center p-4" style="background-color: rgba(116, 255, 174, 0.473);">
        © 2021 Copyright :
        <a class="text-reset fw-bold" href="https://github.com/maulanadityaa"><i class="fab fa-github"></i>
            maulanadityaa</a>
    </div>
</footer>

</html>
