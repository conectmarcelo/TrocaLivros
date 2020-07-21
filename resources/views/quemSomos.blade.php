@extends('layouts.app')

@section('content')
  
<style type="text/css"> 
    h1,p{color: #3490dc;}
    p{color:#3490dc; font-size:20px;}

    .texto{width: 750px; margin:0 auto;  display: block;}
</style>

<div class="container">
    
    <div class="container" >
        <div class="container">
            <div class="rom col-12 d-flex">
                <div class="texto">

                    <h1 align="center" style="font-size: 30px;">Quem Somos?</h1>
                    
                    <p class="text-justify">Somos um grupo de pessoas apaixonadas por livros e a partir dessa paixão nasceu o  Livro Exchange.
                    </p>
                    <p class="text-justify">
                        Adoramos livros! Gostamos de virar as páginas, sentir a textura do papel, olhar com atenção os detalhes da capa, imaginar cada página como se aquilo estivesse acontecendo naquele momento ... Ah, não tem nada melhor do que ler um bom livro.
                    </p> 
                    <p class="text-justify">
                        Gostamos muito de ler livros nas horas vagas, assim que terminamos já queremos começar a ler outro.   
                    </p> 
               
                    <p class="text-justify">
                        O problema é que na estante já não cabe mais nem pensamento e um livro novo custa os olhos da cara. Então pensamos, por que não trocar os livros que já foram lidos? E assim surgiu nosso projeto.
                    </p> 
                    <p class="text-justify">
                        O Livro Exchange incentiva o consumo sustentável, promove a troca colaborativa entre leitores de toda a Baixada Santista e de quebra mantém sua biblioteca sempre atualizada. Ah, tudo isso sem gastar fortunas e sem sair de casa.
                    </p> 
                    <p class="text-justify">Gostou? Quer fazer parte? Clique no botão abaixo.</p><br>
                    
                    <div class="row justify-content-center">
                        <a class="btn btn-lg btn-primary" href="{{ route('register') }}">Cadastre-se</a>
                    </div>
                    
                    
                </div>
            </div>      
        </div> 
    </div>
</div> 
@endsection
