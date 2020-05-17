
@extends('layouts.app')
@section('content')

<div class="container">

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src="{{asset('/carousel/a.jpeg')}}" alt="First slide" width=1324>
    </div>
    <div class="carousel-item">
      <img class="d-block" src="{{asset('/carousel/a.jpeg')}}" alt="Second slide" width=1324>
    </div>
    <div class="carousel-item">
      <img class="d-block" src="{{asset('/carousel/a.jpeg')}}" alt="Third slide" width=1324>
    </div>
  </div>
</div>
<br>


<h1>Vamos Trocar?</h1>

<br>
<div class="row">

@foreach($livros as $livro)

      <div class="card col-2">
        @if($livro->fotos()->count())
        <img src="{{asset('/images/'. $livro->fotos()->first()->foto)}}" class="card-img-top" alt="livro" >
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$livro->nm_titulo_livro}}</h5>
          <p class="card-text">{{$livro->nm_autor_livro}}</p>
          <p class="card-text">Editora: {{$livro->nm_editora_livro}}</p>
          <a href="{{route('livro.edit', ['livro'=> $livro->id])}}" class="btn btn-primary" >Quero este livro!</a>
        </div>
      </div>
      @endforeach
      </div>

      <div class="d-flex justify-content-center">
        {{$livros->links()}}
      </div>

      </div>
@endsection