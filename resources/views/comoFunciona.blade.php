@extends('layouts.app')

@section('content')

    <style>

    @media only screen and (max-width: 600px) {
    video {
    width: 240px;
    }

    </style>



<div class="container">
    
    <div class="text-center">
    <h1>Como Funciona?</h1>
    <h2>Conectamos leitores em todo o Brasil que queiram trocar livros.</h2>
    <span>Veja o vídeo</span>
    </div>
    <div style="width: 680px;    margin:0 auto;  display: block;">
        <video controls>
            <source src="{{URL::asset('/video/TrocaLivros.mkv')}}" type="video/mp4">
        </video>
        
    </div>

</div>
@endsection
