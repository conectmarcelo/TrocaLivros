@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Cadastro de Livros</h1>
    
    <form action="{{route('livro.store')}}" method="post">
    {{csrf_field()}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }} para este ISBN, verifique e faça uma nova pesquisa.</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="row">

            <div class="form-group col ">
                <label for="nm_titulo_livro">Titulo</label>
                <input type="text" class="form-control" id="nm_titulo_livro" name="nm_titulo_livro">
            </div>
            
            <div class="form-group col">
                <label for="cd_isbn_livro">Isbn</label>
                <input type="text" class="form-control" id="cd_isbn_livro" name="cd_isbn_livro">
            </div>
            
            
            
            <div class="form-group col">
                <label for="aa_ano_livro">Ano</label>
                <input type="number" class="form-control" id="aa_ano_livro" name="aa_ano_livro">
            </div>

            <div class="form-group col">
             
        
                <label for="ds_idioma_livro">Idioma</label>
                <select class="form-control"  id="ds_idioma_livro" name="ds_idioma_livro">
                    <option></option>
                    <option>Português</option>
                    <option>Inglês</option>
                    <option>Espanhol</option>
                    <option>Francês</option>
                    <option>Mandarim</option>
                    <option>Japonês</option> 
                    <option>Outros</option>  
                </select>
                       
            </div>

        </div>

        <div class="row">
            <div class="form-group col">
                <label for="ds_categoria_livro">Categoria</label>
                <input type="text" class="form-control" id="ds_categoria_livro" name="ds_categoria_livro" >
            </div>

            <div class="form-group col">
                <label for="nm_autor_livro">Autor</label>
                <input type="text" class="form-control" id="nm_autor_livro" name="nm_autor_livro">
            </div>

            <div class="form-group col">
                <label for="nm_editora_livro">Editora</label>
                <input type="text" class="form-control" id="nm_editora_livro"  name="nm_editora_livro">
            </div>
            
        </div>
        
        <div class="row"> 
            <div class="form-group col">
                <label for="ds_resumo_livro">Resumo</label>
                <textarea class="form-control" id="ds_resumo_livro" name="ds_resumo_livro" rows="3" ></textarea>
            </div>
        </div>
            
            
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="{{route('pesquisar.livro')}}" class="btn btn-danger">Voltar</a>
    </form>
            
    
</div>

@endsection
