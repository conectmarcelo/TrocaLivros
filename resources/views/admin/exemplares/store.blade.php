@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Cadastrar Meu Livro</h1>
    
    <form action="{{route('exemplar.store')}}" method="post">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">




    <div class="form-group">    
        <label >Livro</label>
        <select name="livro_id" class="form-control">
            <option value=""></option>
            @foreach($livros as $livros)
                <option value="{{$livros->id}}">{{$livros->nm_titulo_livro}}</option>
            @endforeach
        </select>
        
            
        
    </div>
    
   
    <div class="form-group">    
    <label >Como esta o livro?</label>
        <select name="estado_exemplar" class="form-control">
            <option value=""></option>
            <option value="usado">Usado</option>
            <option value="novo">Novo</option>
        </select>
        
    </div>

    <div class="form-group">    
    <label >Disponibilizar para Troca?</label>
        <select name="disponibilizar_exemplar" class="form-control">
            <option value=""></option>
            <option value="sim">sim</option>
            <option value="nao">nao</option>
        </select>
        
    </div>

    
   
    
    <input type="submit" class="btn btn-primary"value="cadastrar">
    
</form> 
            
    
</div>

@endsection
