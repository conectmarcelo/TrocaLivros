
@extends('layouts.app')
@section('content')

<div class="container">

  <h1>Meus Livros</h1>

  <a href="{{route('exemplar.new')}}" class="float-right btn btn-primary">Novo</a>

  <table class="table table-striped">
      <thead>
      <tr>
          <th>#</th>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Categoria</th>
          <th>Estato</th>
          <th>Trocar ?</th>
          
          <th>Ações</th>
      </tr>
      </thead>
      <tbody>
          @foreach($exemplares as $e)
          <tr>
          <td >{{$e->id}}</td>
          <td>{{$e->livro->nm_titulo_livro}}</td>
          <td>{{$e->livro->nm_autor_livro}}</td>
          <td>{{$e->livro->ds_categoria_livro}}</td>
          <td>{{$e->estado_exemplar}}</td>
          <td>{{$e->disponibilizar_exemplar}}</td>
          <td>
              <a href="{{route('exemplar.edit', ['exemplar'=> $e->id])}}" class="btn  btn-sm btn-outline-primary">Editar</a>
              <a href="{{route('exemplar.delete', ['exemplar'=> $e->id])}}" class="btn btn-sm btn-outline-danger">Excluir</a>
          </td>

          
      </tr>
          @endforeach
      </tbody>
  </table>  

  <div class="d-flex justify-content-center">
    {{$exemplares->links()}}
  </div>


</div>
@endsection