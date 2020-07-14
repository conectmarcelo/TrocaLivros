@extends('layouts.app')

@section('content')
  
<style type="text/css"> 
    h1,h2{color: #3490dc;}
    p,h3{color:#fff;}
</style>

<div class="container">
    <h1 align="center" style="font-size: 30px;">Quem Somos?</h1>
    <h1 align="center" style="font-size: 30px;">Essa pergunta é muito facil</h1>
    <h2 align="center" style="font-size: 20px;">Somos um grupo de pessoas apaixonadas por livros e apartir dessa paixão nasceu o  Livro Exchange.</h2>
    <br>
    <div class="jumbotron jumbotron-fluid" style="background-color: #3490dc;">
        <div class="container">
            <div class="rom col-12 d-flex">
                <div class="col-4">
                    <p class="text-justify">
                        Adoramos livros, mas assim, MUITO! Gostamos de virar as páginas, sentir a textura do papel, olhar com atenção os  dethes da capa, imaginar cada pagina como se aquilo estivese acontecendo naquele momento ... Ah, não tem nada melhor do que ler um bom livro.
                    </p> 
                    <p class="text-justify">
                        Gostamos muito de ler livros nas horas vagas, geralmente demoramos um mes paraler um livro e assim que terminamos ja queremos começar a ler outro.   
                    </p> 
                </div>
                <div class="col-4">
                    <p class="text-justify">
                        O problema é que chegou em um nivel que na estante ja não cabe  mais nem pensamento e um livro novo custa os olhos da cara. Então pensamos, por que não Trocar um livro ja lido por um que ainda nao foi lido, dessa forma consegiriamos um livro "novo" e
                        ajudariamos outra pessoas a ter um livro "novo" tambem.
                    </p> 
                    <p class="text-justify">
                        O Livro Exchange incentiva o consumo sustentável, promove a troca colaborativa entre leitores de toda a Baixada Santista e de quebra mantém sua biblioteca sempre atualizada. Ah, tudo isso sem gastar fortunas, nem sair de casa, Facinho, hein? kkkkkk.
                    </p> 
                </div> 
                <div class="col-4"> 
                    <h3>Gostou, Quer fazer Parte, clique no botão abaixo.</h3>
                    <button type="button" class="btn btn-info">Cadastre-se.</button>
                </div>
            </div>      
        </div> 
    </div>
</div> 
@endsection
