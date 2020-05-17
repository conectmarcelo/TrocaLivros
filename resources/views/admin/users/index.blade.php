
@extends('layouts.app')
@section('content')

<div class="container">

  <h1>Usuarios</h1>

  <a href="{{route('user.new')}}" class="float-right btn btn-primary">Novo</a>

  <table class="table table-striped">
      <thead>
      <tr>
          <th>#</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
      </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
          <td >{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td >{{$user->email}}</td>
          <td>
              <a href="{{route('user.edit', ['user'=> $user->id])}}" class="btn  btn-sm btn-outline-primary">Editar</a>
              <a href="{{route('user.delete', ['user'=> $user->id])}}" class="btn btn-sm btn-outline-danger">Excluir</a>
              
          </td>

          
      </tr>
          @endforeach
      </tbody>
  </table>  

  <div class="d-flex justify-content-center">
    {{$users->links()}}
  </div>


</div>
@endsection