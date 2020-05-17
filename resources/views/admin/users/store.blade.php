@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Inserção de usuários</h1>
    
    <form action="{{route('user.store')}}" method="post">
    {{csrf_field()}}
    
        <div class="row">

            <div class="form-group col ">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <div class="form-group col">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            
            <div class="form-group col">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group col">
                <label for="confirm_password">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
            </div>

        </div>

        
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
            
    
</div>

@endsection
