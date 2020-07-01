
@extends('layouts.app')
@section('content')


<div class="container">



<div class="row col-12 justify-content-end">
    <a href="{{route('troca.notificacao')}}" class="btn btn-lg btn-danger" style="width:100px">Voltar</a>
</div>



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
          
          <h5 class="card-title">{{$e->livro->nm_titulo_livro}}</h5>
          <p class="card-text">autor: {{$e->livro->nm_autor_livro}}</p>
          
          <a href="{{route('troca.resumo2',['exemplar' => $e->id, 'trocaId' => $troca])}}" class="btn btn-primary" >Quero este livro!</a>
          
        </div>
      </div>
      @endforeach


     
      </div>

      <div class="d-flex justify-content-center">
       
      </div>

      </div>
@endsection