<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-info shadow-sm">
            <div class="container ">
                <a class="navbar-brand" href="http://127.0.0.1:8000/">
                    <img src="{{asset('/logotipo/logotipo.png')}}" alt="logo" width=90 height=60>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        
                    <div class="col-8 " >
                        <form class="form-inline my-6 my-lg-0" method="get" action="/pesquisar"style="margin: auto;">
                        {{csrf_field()}}
                            <input size="50" class="form-control mr-sm-2" type="text" placeholder="Pesquisa por livro, autor..." aria-label="Search" name="text" id="text">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
                        </form>
                    </div>
                    <div >
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    <img src="{{asset('/images/'. Auth::user()->ds_foto)}}" alt="foto" style=" with:40px; height:40px; border-radius:50%;">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          
                                    <ul style="list-style:none;">
                                        <li><a class="nav-link" href="{{route('livro.index')}}">Livros</a></li>
                                        <li><a class="nav-link" href="{{route('user.index')}}">Usuários</a></li>
                                        <li><a class="nav-link" href="{{route('user.edit.perfil')}}">Perfil</a></li>
                                        <li><a class="nav-link" href="{{route('exemplar.index')}}">Meus Livros</a></li>
                                        <li><a class="nav-link" href="">Minhas Trocas</a></li>
                                        <li><a class="nav-link" href="">Notificações</a></li>
                                        <li><a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a></li>
                                    </ul>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="nav justify-content-center">

            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Como funciona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Quem Somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contato" >Contato</a>
            </li>
                                        
        </ul>
    </div>

        <main class="py-4">
            <div class="container">
            @include('flash::message')
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
