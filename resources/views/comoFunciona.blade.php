@extends('layouts.app')

@section('content')

<style type="text/css">
    h1,p {color: #fff;}
</style>

<div class="container">
    
    <h1 class="h" align="center" style="color: #3490dc;" >Como Funciona</h1>
    <br>
    <div class="jumbotron jumbotron-fluid" style="background-color: #3490dc;">
        <div class="container">
            <h1 class="display-4">Cadastre um livro</h1>
            <p class="lead" style="color: #fff;"> Voçê  cadastrará  no site um livro que esteja disponível para troca</p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" style="color: #3490dc;">Procurar o  livro</h1>
            <p class="lead" style="color: #3490dc;">Voçê irá procurar um livro de seu interesse no site.</p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid" style="background-color: #3490dc;">
        <div class="container">
            <h1 class="display-4" style="color: #fff;">Clique no livro</h1>
            <p class="lead" style="color: #fff";>Apos achar o livro Voçê irá clicar no mesmo.</p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" style="color: #3490dc;">Escolha um usuario</h1>
            <p class="lead" style="color: #3490dc;">Apareçera os usuarios que tem esse livro para troca; Voçê escolherá um e clicará no botão quero trocar.
            </p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid" style="background-color: #3490dc;">
        <div class="container">
            <h1 class="display-4" style="color: #fff;">Escolha de um livro seu </h1>
            <p class="lead" style="color: #fff;">O usuario resceberá uma notificação e por ela conseguirá ascessar o seu perfil e ver os seus livros, caso o mesmo nao ache nenhum interessante ele pode optar por não fazer a troca.
            </p>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" style="color:#3490dc ;">A troca </h1>
            <p class="lead" style="color: #3490dc;">Se o usuario escolher um livro seu voçe rescebera os dados dele para combinar a troca com o  mesmo.
            </p>
        </div>
    </div>
</div>
@endsection
