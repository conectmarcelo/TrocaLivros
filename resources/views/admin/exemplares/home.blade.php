@extends('layouts.app')
@section('content')

<div class="container">
<h1>Exemplares</h1><br>

    @guest

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="10000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block col-12" src="{{asset('/carousel/carrosel.jpg')}}" alt="First slide" >
                </div>
                <div class="carousel-item">
                    <img class="d-block col-12" src="{{asset('/carousel/2.jpeg')}}" alt="Second slide" >
                </div>
                <div class="carousel-item">
                    <img class="d-block col-12" src="{{asset('/carousel/carrosel.jpg')}}" alt="Third slide">
                </div>
            </div>
        </div>
        <br>
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    @endguest


    @if ((Auth::check()))



    <!-------------------------------------------------------------------------------------------------->

    <!-- Styles -->
    <link href="{{asset('css/sidebar.css') }}" rel="stylesheet">

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>


    <nav>
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
    </nav>

    <div class="wrapper">
            <!-- Sidebar Holder -->
        
        <form action="{{route('pesquisarSideBar.livro')}}" method="get">
        
            <nav id="sidebar">
                <div class="sidebar-header">
                    <ul class="list-unstyled CTAs">
                        <li>
                            <input type="submit" class="filtrar btn btn-outline-primary" value="Filtrar">
                        </li>
                    </ul>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categoria</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Acao">
                                <label for="scales"> Ação</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Aventura">
                                <label for="scales"> Aventura</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]"  value="Auto Ajuda" >
                                <label for="scales"> Auto Ajuda</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Biografia"> 
                                <label for="scales"> Biografia</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Design"> 
                                <label for="scales"> Design</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Didaticos"> 
                                <label for="scales"> Didáticos</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Drama"> 
                                <label for="scales"> Drama</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Ficcao"> 
                                <label for="scales"> Ficção</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Quadrinhos"> 
                                <label for="scales"> HQ's/Quadrinhos</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Romance"> 
                                <label for="scales"> Romance</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Suspense"> 
                                <label for="scales"> Suspense</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Terror"> 
                                <label for="scales"> Terror</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_categoria_livro[]" value="Outros"> 
                                <label for="scales"> Outros</label>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Condição</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                            <input type="checkbox" id="scales" name="estado_exemplar[]" value="Novo"> 
                                <label for="scales"> Novo</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="estado_exemplar[]" value="Usado"> 
                                <label for="scales"> Usado</label>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cidade</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <input type="checkbox" id="scales" name="ds_cidade[]" value="Santos"> 
                                <label for="scales"> Santos</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_cidade[]" value="Sao Vicente"> 
                                <label for="scales"> São vicente</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_cidade[]" value="Praia Grande"> 
                                <label for="scales"> Praia Grande</label>
                            
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_cidade[]" value="Guaruja"> 
                                <label for="scales"> Guarujá</label>
                            </li>
                            <li>
                                <input type="checkbox" id="scales" name="ds_cidade[]" value="Cubatao"> 
                                <label for="scales"> Cubatão</label>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </form>
        @else
    @endif   

    <!------------------------------------------------------------------------------------->
    
        <div class="row" style="margin-left:0px;">

            @foreach($exemplares as $e)
            
            <div class="card">
                
                @if($e->ds_foto == '')
                    <img src="{{asset('/images/livro.jpg')}}" class="card-img-top" alt="livro" >
                    @else 
                    <img src="{{asset('/images/'. $e->ds_foto)}}" class="card-img-top" alt="livro" >
                @endif
                    <div class="card-body">
                        <br><h5 class="card-title" style="font-size:11px"><b>{{$e->nm_titulo_livro}}</b></h5>
                        <p class="card-text" style="font-size:11px">{{$e->nm_autor_livro}}</p>
                        <p class="card-text"style="font-size:11px">Trocador: {{$e->name}}</p>
                        <p class="card-text"style="font-size:11px">Cidade: {{$e->ds_cidade}} / {{$e->ds_uf}}</p>
                        <a href="{{route('exemplar.resumo',['exemplar' => $e->id])}}" class="btn btn-primary" >Quero este livro!</a>
                    </div>
            </div>
            @endforeach
        </div>
    
</div>
@endsection