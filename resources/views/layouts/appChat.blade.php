<!DOCTYPE html>
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

    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a7a7a7;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #929292;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            list-style: none;
        }

        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }

        .user {
            cursor: pointer;
            padding: 5px 0;
            position: relative;
        }

        .user:hover {
            background: #eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left: 13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color: #ffffff;
            font-size: 12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }

        .media-body p {
            margin: 6px 0;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
        }

        .sent {
            background: #3bebff;
            float: right;
            text-align: right;
        }

        .message p {
            margin: 5px 0;
        }

        .date {
            color: #777777;
            font-size: 12px;
        }

        .active {
            background: #eeeeee;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }
    </style>
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
                                        
                                    @if(Auth::user()->email == 'admin@admin.com')

                                        <li><a class="nav-link" href="{{route('livro.index')}}">Livros</a></li>
                                        <li><a class="nav-link" href="{{route('user.index')}}">Usuários</a></li>
                                        <li><a class="nav-link" href="{{route('chat')}}">Chat</a></li>
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
                                        <li><a class="nav-link" href="{{route('chat')}}">Chat</a></li>
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
                <a class="nav-link" href="/livros/public/comoFunciona">Como funciona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/livros/public/quemSomos">Quem Somos</a>
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

    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('cbb366231d21419138d9', {
            cluster: 'eu',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            //alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function (e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>
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
