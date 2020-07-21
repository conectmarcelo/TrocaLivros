
@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row">
        
        <div class="col-10 ">
            <h1>Meus Livros</h1>
        </div>
        <div class="col-2 ">
            <a href="{{route('pesquisar.livro')}}" class="btn btn-lg btn-primary">INCLUIR</a>
        </div>
        
    </div>
    

    
    
    <div class="row">

        @foreach($exemplares as $e)

        <div class="card" style="margin-left:20px;">
            
            @if($e->fotos()->count() == '')
                <img src="{{asset('/images/livro.jpg')}}" class="card-img-top" alt="livro" >
            @else 
                @if($e->fotos()->count())
                    <img src="{{asset('/images/'. $e->fotos()->first()->foto)}}" class="card-img-top" alt="livro">
                @endif
            @endif
            
            <div class="card-body">
                
                <p class="card-title" style="font-size:11px"><b>{{$e->livro->nm_titulo_livro}}</b></p>
                
                <p class="card-text" style="font-size:11px">Autor: {{$e->livro->nm_autor_livro}}</p>
                <p style="font-size:11px">Categoria: {{$e->livro->ds_categoria_livro}}</p>
                <p style="font-size:11px">Condição: {{$e->estado_exemplar}}</p>
                <p style="font-size:11px">Disponínvel Troca: {{$e->disponibilizar_exemplar}}</p>
                <a href="{{route('exemplar.edit', ['exemplar'=> $e->id])}}" class="btn  btn-sm btn-outline-primary">Editar</a>
                <a href="{{route('exemplar.foto', ['exemplar'=> $e->id])}}" class="btn btn-sm btn-outline-success">Foto</a>  
            </div>
        </div>
        @endforeach
    </div>
</div> 
@endsection