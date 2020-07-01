
@extends('layouts.app')
@section('content')

<div class="container">

@guest
    
@if (Route::has('register'))
    
@endif

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
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

@else
    
@endguest

    <h1>Livros disponíveis para troca</h1>
    <br>
    <div class="row">

        @foreach($exemplares as $e)

        <div class="card col-2">
            @if($e->fotos()->count() == '')
                <img src="{{asset('/images/livro.jpg')}}" class="card-img-top" alt="livro" >
            @else 
              @if($e->fotos()->count())
                <img src="{{asset('/images/'. $e->fotos()->first()->foto)}}" class="card-img-top" alt="livro" >
              @endif
            @endif

            <div class="card-body">
                <p class="card-title"></b>{{$e->livro->nm_titulo_livro}}</b></p>
                <p>Condição: {{$e->estado_exemplar}}</p>
                <p class="card-text">{{$e->user->name}}</p>
                <p class="card-text">Cidade: {{$e->user->ds_cidade}}/{{$e->user->ds_uf}}</p>
                <a href="{{route('exemplar.resumo',['exemplar' => $e->id])}}" class="btn btn-primary" >Quero este livro!</a>
            </div>
        </div>
        @endforeach
    </div>
    <p></p>
    
</div>
@endsection