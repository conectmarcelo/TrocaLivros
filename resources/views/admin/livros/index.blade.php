
@extends('layouts.app')
@section('content')

<div class="container">

  <h1>Livros</h1>

  <div class="form-inline float-right">
  <a href="{{route('livro.index')}}" class="btn btn-danger">Voltar</a>
  <a href="{{route('livro.new')}}" class="btn btn-primary">Novo</a>
  </div>
  <table class="table table-striped">
      <thead>
      <tr>
          <th>#</th>
          <th>Titulo</th>
          <th>ISBN</th>
          <th>Ano</th>
          <th>Idioma</th>
          <th>Categoria</th>
          <th>Autor</th>
          <th>Editora</th>
          <th>Ações</th>
      </tr>
      </thead>
      <tbody>
          @foreach($livros as $livro)
          <tr>
          <td >{{$livro->id}}</td>
          <td>{{$livro->nm_titulo_livro}}</td>
          <td>{{$livro->cd_isbn_livro}}</td>
          <td>{{$livro->aa_ano_livro}}</td>
          <td>{{$livro->ds_idioma_livro}}</td>
          <td>{{$livro->ds_categoria_livro}}</td>
          <td>{{$livro->nm_autor_livro}}</td>
          <td>{{$livro->nm_editora_livro}}</td>
          <td>
              <a href="{{route('livro.edit', ['livro'=> $livro->id])}}" class="btn  btn-sm btn-outline-primary">Editar</a>
              <a href="{{route('livro.delete', ['livro'=> $livro->id])}}" class="btn btn-sm btn-outline-danger">Excluir</a>
              
          </td>

          
      </tr>
          @endforeach
      </tbody>
  </table>  

  <div class="d-flex justify-content-center">
    {{$livros->links()}}
  </div>


</div>
@endsection