@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Editar Meu Livro</h1>
    
    <form action="{{route('exemplar.update', ['exemplar' => $exemplar->id])}}" method="post">
    {{csrf_field()}}

        <div class="row">    
         

        <div class="form-group col ">
            <label for="nm_titulo_livro">Titulo</label>
            <input type="text" class="form-control" id="nm_titulo_livro" name="nm_titulo_livro" value="{{$exemplar->livro->nm_titulo_livro}}" disabled="true">
        </div>

                 

        <div class="form-group col-3">    
            <label >Estado</label>
            <select name="estado_exemplar" class="form-control">
                <option value=""></option>
                <option value="novo">Novo</option>
                <option value="usado">Usado</option>
            </select>
        </div>
            

            
            <div class="form-group col-3">    
                <label >Trocar?</label>
                <select name="disponibilizar_exemplar" class="form-control">
                    <option value=""></option>
                    <option value="sim">sim</option>
                    <option value="nao">nao</option>
                </select>
            
            </div>


        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    
    
</div>

@endsection