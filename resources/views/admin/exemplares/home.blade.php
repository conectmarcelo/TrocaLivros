
@extends('layouts.app')
@section('content')

<div class="container">

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block col-12" src="{{asset('/carousel/carrosel.jpg')}}" alt="First slide" >
    </div>
    <div class="carousel-item">
      <img class="d-block col-12" src="{{asset('/carousel/carrosel.jpg')}}" alt="Second slide" >
    </div>
    <div class="carousel-item">
      <img class="d-block col-12" src="{{asset('/carousel/carrosel.jpg')}}" alt="Third slide">
    </div>
  </div>
</div>
<br>


<br>
<div class="row">

@foreach($exemplares as $e)

      <div class="card col-2">
       
      @if($e->fotos()->count())
        <img src="{{asset('/images/'. $e->fotos()->first()->foto)}}" class="card-img-top" alt="livro" >
        @endif

        <div class="card-body">
          
          <h5 class="card-title">{{$e->livro->nm_titulo_livro}}</h5>
          <p class="card-text">{{$e->livro->nm_autor_livro}}</p>
          <p class="card-text">{{$e->user->name}}</p>

          <a href="" class="btn btn-primary" >Quero este livro!</a>
        </div>
      </div>
      @endforeach


     
      </div>

      <div class="d-flex justify-content-center">
       
      </div>

      </div>
@endsection