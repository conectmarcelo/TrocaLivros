
@extends('layouts.app')
@section('content')

<div class="container">

@guest
    
@if (Route::has('register'))
    
@endif

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

@else
    
@endguest



<br>
<div class="row">

@foreach($livros as $livro)

      <div class="card col-2">

      @if($livro->foto == '')
                <img src="{{asset('/images/livro.jpg')}}" class="card-img-top" alt="livro" >
            @else 
              
              <img src="{{asset('/images/'. $livro->foto)}}" class="card-img-top" alt="livro" >
             
      @endif
  
        <div class="card-body">
          <p class="card-title"><b>{{$livro->nm_titulo_livro}}</b></p>
          <p class="card-text">Autor: {{$livro->nm_autor_livro}}</p>
          <p class="card-text">Editora: {{$livro->nm_editora_livro}}</p>
          <a href="{{route('exemplar.pesquisaPorTitulo', ['livro'=> $livro->id])}}" class="btn btn-primary" >Quero este livro!</a>
        </div>
      </div>
      @endforeach
      </div>

     

      </div>
@endsection