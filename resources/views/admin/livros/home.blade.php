
@extends('layouts.app')
@section('content')

<div class="container">



<br>
<div class="row">

@foreach($livros as $livro)

      <div class="card col-2">
        
        <img src="{{asset('/images/'. $livro->exemplares->fotos->[{0}]first()->foto)}}" class="card-img-top" alt="livro" >
        
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