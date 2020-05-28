@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid" style="background-color: #6cb2ed;">
    <div class="container">
        <h1 style ="color :white;font-family: helvética;" class="display-4">Alguma dúvida ou sugestão nos envie</h1>
        <p style ="color :white; font-family: helvética;" class="lead" align="center"> Garantimos uma resposta rápida e satisfatória. </p>
    </div>
</div>


<div class="row" >
    <form class="col-6" method="POST">
  
        <div class="form-group" style="position: relative;left: 55%;">
            <label for="exampleInputPassword1">Nome:</label>
            <input type="password" class="form-control" id="exampleInputNome1" placeholder="Seu Nome">
        </div>
        <div class="form-group" style="position: relative;left: 55%;">
            <label for="exampleInputEmail1"> E-mail: </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu e-mail">
        </div>
        <div style="position: relative;left: 55%;">
            <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escreva aqui sua sugestãõ/critica."></textarea>
        </div>
        <div class="form-check" style="position: relative;left: 55%;">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Aceito resceber uma resposta por e-mail</label>
        </div>
        <br>
        <div style="position: relative;left: 100%;" >
            <button type="submit" class="btn btn-primary">Enviar </button>
        </div>
    </form>
</div>
@endsection
