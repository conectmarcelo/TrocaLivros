@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edição Usuários</h1>
    
    <form action="{{route('user.update', ['user' => $user->id])}}" method="post">
    {{csrf_field()}}

        <div class="row">    
            
            <div class="form-group col">
                <label for="name">Titulo</label>
                <input type="text" class="form-control col" id="name" name="name" value="{{$user->name}}">
            </div>
            
            <div class="form-group col">
                <label for="email">Email</label>
                <input type="email" class="form-control col" id="email" name="email" value="{{$user->email}}">
            </div>
            
            <div class="form-group col">
                <label for="password">Senha</label>
                <input type="Password" class="form-control col" id="password" name="password" value="{{$user->password}}">
            </div>

            <div class="form-group col">
                <label for="confirm_password">Confirmar Senha</label>
                <input type="password" class="form-control col" id="confirm_password" name="confirm_password" value="{{$user->caonfirm_password}}">
            </div>

        </div>

        
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
    
</div>
            
@endsection