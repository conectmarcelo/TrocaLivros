@extends('layouts.app')
@section('content')




<div class="container">
        
   
    
    <form action="{{route('troca.solicita')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

        <input type="hidden" name="cd_usuario_a" value="{{ Auth::user()->id}}">
        <input type="hidden" name="cd_usuario_b" value="{{$exemplar->user->id}}">
        <input type="hidden" name="cd_exemplar_a" value="">
        <input type="hidden" name="cd_exemplar_b" value="{{$exemplar->id}}">
        <input type="hidden" name="ds_status_troca" value="solicitado">

        
        
        

        
    
        <div class="row">

            <div class="col-4">



            @if($exemplar->fotos()->count() == '')
                <img src="{{asset('/images/livro.jpg')}}" class="card-img-top" alt="livro" >
            @else 
              @if($exemplar->fotos()->count())
              <img src="{{asset('/images/'. $exemplar->fotos()->first()->foto)}}"  alt="exemplar" style="width:260px; height:390px;" ><br>
             @endif
            @endif
      
        

                
                <br>
                
                <input type="submit" class="btn btn-lg btn-primary" value="Solicitar Troca" style="width:160px">           
                <a href="{{route('single.livros')}}" class="btn btn-lg btn-danger" style="width:100px">Voltar</a>
            </div>

            <div class="row col-8">
                
                <div>
                    <h1>Sinopse</h1>
                    <p class="text-justify"> {{$exemplar->livro->ds_resumo_livro}}</p>
                </div>

                
                <h1>Mais Informações</h1>
                <div class="row col-12">
                                
                    
                    <div class="col-6" style="padding:0px;">
                        
                        <p>Trocador: {{$exemplar->user->name}}</p>
                        <p>Cidade: {{$exemplar->user->ds_cidade}} / {{$exemplar->user->ds_uf}}</p>
                        <p>Condição: {{$exemplar->estado_exemplar}}</p>
                        
                    </div>
                
                    <div class="col-6">
                        
                        <p>Ano: {{$exemplar->livro->aa_ano_livro}}</p>
                        <p>Editora: {{$exemplar->livro->nm_editora_livro}}</p>
                        <p>ISBN: {{$exemplar->livro->cd_isbn_livro}}</p>

                    </div>

                
                </div>

                    
                
            </div>
            

        </div>

        
    </form>
    
</div>


















            
    @endsection