
@extends('layouts.app')
@section('content')


<div class="container">


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

          <a href="{{route('troca.resumo2',['exemplar' => $e->id, 'trocaId' => $troca])}}" class="btn btn-primary" >Quero este livro!</a>
          
        </div>
      </div>
      @endforeach


     
      </div>

      <div class="d-flex justify-content-center">
       
      </div>

      </div>
@endsection