@extends('layouts.app')
@section('content')

<div class="container">
        
    <form action="{{route('exemplar.store')}}" method="post">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">


    <!--Pegando o id do usuario logado e salvando no banco como user_id -->
    <input type="hidden" name=user_id value="{{Auth::user()->id}}">
    <input type="hidden" name="livro_id" id="livro_id" value="{{$livros->id}}">
    
    <div class="form-group">    
        
        <h1>Meu Livro: "{{$livros->nm_titulo_livro}}"</h1>
                 
        
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
