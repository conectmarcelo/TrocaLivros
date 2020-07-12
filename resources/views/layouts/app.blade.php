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
                <a class="navbar-brand" href="{{route('single.livros')}}">
                    <img src="{{asset('/logotipo/logotipo.png')}}" alt="logo" width=90 height=60>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        
                    <div class="col-8 " >
                        <form class="form-inline my-6 my-lg-0" method="get" action="{{route('single.pesquisar')}}" style="margin: auto;">
                        {{csrf_field()}}
                            <input size="50" class="form-control mr-sm-2" type="text" placeholder="Título, Autor ou ISBN" aria-label="Search" name="text" id="text">
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

                                    @if(Auth::user()->ds_foto == '')

                                    
                                    <img src="{{asset('/images/perfil.jpg')}}" alt="foto" style=" with:40px; height:40px; border-radius:50%;">

                                    @else
                                    <img src="{{asset('/images/'. Auth::user()->ds_foto)}}" alt="foto" style=" with:40px; height:40px; border-radius:50%;">
                                

                                    @endif   
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          
                                    <ul style="list-style:none; padding:0px;">
                                        
                                    @if(Auth::user()->email == 'conectmarcelo@hotmail.com')

                                        <li><a class="nav-link" href="{{route('livro.index')}}">Livros</a></li>
                                        <li><a class="nav-link" href="{{route('user.index')}}">Usuários</a></li>
                                        <li><a class="nav-link" href="{{route('user.edit.perfil')}}">Perfil</a></li>
                                        <li><a class="nav-link" href="{{route('exemplar.index')}}">Meus Livros</a></li>
                                        <li><a class="nav-link" href="{{route('troca.index')}}">Minhas Trocas</a></li>
                                        <li><a class="nav-link" href="{{route('troca.solicitacao')}}">Solicitações Enviadas</a></li>
                                        <li><a class="nav-link" href="{{route('troca.notificacao')}}">Solicitações Recebidas</a></li>
                                        <li><a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a></li>
                                    </ul>                


                                    @else
                                        <li><a class="nav-link" href="{{route('user.edit.perfil')}}">Perfil</a></li>
                                        <li><a class="nav-link" href="{{route('exemplar.index')}}">Meus Livros</a></li>
                                        <li><a class="nav-link" href="{{route('troca.index')}}">Minhas Trocas</a></li>
                                        <li><a class="nav-link" href="{{route('troca.solicitacao')}}">Solicitações Enviadas</a></li>
                                        <li><a class="nav-link" href="{{route('troca.notificacao')}}">Solicitações Recebidas</a></li>
                                        <li><a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a></li>
                                    </ul>
                                    @endif
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
                <a class="nav-link" href="{{route('single.livros')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Como funciona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Quem Somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/livros/public/contato" >Contato</a>
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

<footer class="page-footer font-small indigo" style="background-color: #6cb2eb; margin-top:100px;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>

        a{
            color: #364e94;
            
        }
        
        a:hover{
            text-decoration: none;
        }

        

        .fa {
        font-size:30px;
        
        text-align: center;
        text-decoration: none;
        }

        
        .fa:hover {
        opacity: 0.7;
        }

        .fa-facebook {
        color: white;
        }

        .fa-envelope{
        color: white;
        }

    </style>


    <div class="container text-center text-md-left">
        <br>
        <div class="row">

            <div class="col-md-4 mx-auto">

                <ul class="list-unstyled">
                    <li>
                        <a href="{{route('single.livros')}}" >Home</a>
                    </li>
                    
                    <li>
                        <a href="">Como Funciona</a>
                    </li>
                    
                    <li>
                        <a href="">Quem Somos</a>
                    </li>

                    <li>
                        <a href="/contato">Contato</a>
                    </li>
                </ul>

            </div>
     
            <div class="col-md-4 mx-auto">

                <ul class="list-unstyled">
                    <li>
                        <a href="">Política de Privacidade</a>
                    </li>
                </ul>

            </div>
     
            <div class="col-md-3 mx-auto">
                <ul class="list-unstyled">
                    <li>
                    <a href=""><i class="fa fa-envelope"> </i> livroexchange@gmail.com</a>
                    </li>
                    <li>
                    <a href=""><i class="fa fa-facebook"> </i> livroexchange</a>
                    </li>

                   
                    
      
        </div>
    </div>
</footer>

</html>
