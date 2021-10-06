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
    @livewireScripts
    <!-- Produces: -->
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #38c172;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172"
                        style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#ffffff">
                                <path
                                    d="M123.52492,29.46522c-1.5689,0.0249 -3.12377,0.48078 -4.49036,1.35355l-7.99811,5.10625c-7.73319,-3.63458 -16.32806,-2.81048 -22.81856,1.79447c-1.40216,0.99509 -1.62762,2.99036 -0.45981,4.25241c1.06103,1.14667 2.64903,1.21104 3.7681,0.42342c5.02097,-3.53424 11.43225,-3.91761 17.08102,-1.27097l1.67689,9.57772c0.49808,2.838 2.36883,5.22811 5.00617,6.38911l15.88845,6.9917c4.30932,1.89988 9.41516,-0.04435 11.33439,-4.40778l4.90889,-11.15173c1.91314,-4.35268 -0.05976,-9.4227 -4.40778,-11.33369l-15.88495,-6.9945c-1.1554,-0.50794 -2.38407,-0.74933 -3.60433,-0.72996zM68.31849,36.0349c-5.65702,0.1599 -11.12115,3.75009 -12.85941,9.81567c-2.52983,8.82933 -10.24523,15.43694 -18.76281,16.06761c-6.24933,0.46225 -12.65969,-2.26111 -17.14961,-7.28495c-2.84517,-3.18917 -7.18461,-4.461 -11.31619,-3.32508c-4.79808,1.32225 -8.16309,5.68622 -8.23117,10.65272v20.04567c0,1.58777 1.29079,2.85341 2.87856,2.86667c16.4647,0.13724 30.50263,10.56004 31.88257,27.87721c0.11825,1.4835 1.36661,2.62031 2.85477,2.62031h131.51813c1.58312,0 2.86667,-1.28355 2.86667,-2.86667v-2.30747c0,-7.62892 -4.90173,-14.2405 -12.19453,-16.45464c-15.65773,-4.74863 -30.68123,-11.74771 -44.83576,-21.12207c-0.86824,-0.57477 -1.97393,-0.64343 -2.90166,-0.17007c-0.81019,0.41316 -2.00209,0.82731 -4.10264,2.33266c-3.90153,2.78102 -6.67493,6.63405 -8.14159,10.97956c-0.51707,1.52829 -2.17029,2.29818 -3.63372,1.79866c-1.50142,-0.50525 -2.30391,-2.13161 -1.79866,-3.63302c1.89558,-5.60111 5.46346,-10.44863 10.40846,-13.93091c1.56771,-1.10403 1.61237,-3.41972 0.09518,-4.59254c-1.03487,-0.80016 -2.06106,-1.61138 -3.07873,-2.43555c-1.31688,-1.0664 -3.23926,-0.7592 -4.19852,0.63758c-3.36798,4.90308 -8.86245,7.65571 -14.68537,7.97641c-1.52077,0.10141 -2.92962,-1.08746 -3.02064,-2.7057c-0.086,-1.58025 1.12474,-2.93105 2.70499,-3.02064c4.67518,-0.25907 8.97897,-2.63102 11.17412,-7.02669c0.56222,-1.12588 0.30056,-2.49357 -0.62359,-3.34748c-4.95575,-4.58022 -9.66309,-9.47135 -14.09818,-14.65177c-2.91975,-3.40845 -6.8801,-4.90491 -10.7507,-4.79551zM2.90586,90.62684c-1.59817,-0.02258 -2.90586,1.27024 -2.90586,2.86877v19.00846c0,1.58312 1.28355,2.86667 2.86667,2.86667h23.23428c1.72466,0 3.04671,-1.50936 2.84497,-3.2222c-1.61178,-13.6869 -12.92756,-21.33859 -26.04006,-21.5217zM2.86667,121.10407c-1.58312,0 -2.86667,1.28355 -2.86667,2.86667v4.23211c0,7.91594 6.41739,14.33333 14.33333,14.33333h20.4068c4.43258,0 8.63631,-2.03164 11.23781,-5.43939c2.48647,-3.25259 7.32143,-3.25653 9.81077,0c2.6015,3.40775 6.80523,5.43939 11.23781,5.43939h90.64014c7.91594,0 14.33333,-6.41739 14.33333,-14.33333v-4.23211c0,-1.58347 -1.28355,-2.86667 -2.86667,-2.86667z">
                                </path>
                            </g>
                        </g>
                    </svg> {{ 'SP-Shop' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-white">
                        <!-- Authentication Links -->
                        @if (Auth::user())
                            @if (Auth::user()->level == 1)
                                <li class="nav-item">
                                    <a class="nav-link btn btn-light text-success" href="{{ url('tambah-produk') }}"><i
                                            class="far fa-plus-square"></i>{{ ' Tambah Produk' }}</a>
                                </li>
                            @else
                                @php
                                    $keranjang = \App\Models\Belanja::where('user_id', Auth::user()->id)->value('produk_id');
                                @endphp
                                @if ($keranjang > 0)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('keranjang') }}"><i
                                                class="fas fa-shopping-basket"></i>{{ ' Keranjang' }}<span
                                                class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                            </span></a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('keranjang') }}"><i
                                                class="fas fa-shopping-basket"></i>{{ ' Keranjang' }}</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-user"></i>
                                        {{ Auth::user()->name }}</a>
                                </li>
                            @endif

                        @endif

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i
                                            class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i
                                            class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->level == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <img
                                                src="https://img.icons8.com/material-outlined/15/000000/dashboard-layout.png" />
                                            {{ 'Dashboard' }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                            <div>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><i
                                            class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <div class="text-center p-4" style="background-color: rgba(116, 255, 174, 0.473);">
        © 2021 Copyright :
        <a class="text-reset fw-bold" href="https://github.com/maulanadityaa"><i class="fab fa-github"></i>
            maulanadityaa</a>
    </div>
    <!-- Copyright -->
</footer>

</html>
