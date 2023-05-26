<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TubeConcurso') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
        body {
            background-image: url("../../../build/assets/imagens/textoboasvindas.png");
            background-size:30%;
        }

        footer{

            background: #ddfcc5;
            width: 100%;
            height: 60%;
            position: fixed;
            bottom: 0;
            left: 0;
            color: #000000;
            text-decoration: blink;
            display: flex;
            align-items: center; //centraliza horizontalmente
            text-align: center;
            justify-content: center; //cetraliza verticalmente

        }

        footer.fixar-rodape{
            border-top: 1px solid  #FFFFFF;
            bottom: 0;
            left: 0;
            height: 60px;
            position: fixed;
            width: 100%
        }

        div.body-content{

            margin-bottom: 60px;
        }

        p{
            display: flex;
            align-items: center; //centraliza horizontalmente
            justify-content: center; //cetraliza verticalmente
        }


</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md" style="background-color: #ddfcc5" navbar-static-top >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img classe="img-responsive" src="../../../build/assets/imagens/logosistematubemini.png" text-align="center" alt="Logo">

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{"Bem vindo, "}}{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container body-content">
            @yield('content')
        </div>
            <footer class="fixar-rodape">
                   <p>  &copy; TubeConcurso - Todos os direitos reservados - 2023</p>
            </footer>
         </main>
     </div>
</body>
</html>
