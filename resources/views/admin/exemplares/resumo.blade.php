@extends('layouts.app')
@section('content')




<div class="container">
        
   
    
    <form action="" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    
        <div class="row col-12">

            <div class="col-3">

                <img src="{{asset('/images/'. $exemplar->fotos()->first()->foto)}}"  alt="exemplar" style="width:260px; height:390px;" > 
                    
                
               
                
            </div>

            <div class="col-9">
                
                <div class="col-12">
                    <h1>Sinopse</h1>
                    <p class="text-justify"> {{$exemplar->livro->ds_resumo_livro}}</p>
                </div>

                
                
                <div class="row">
                
                    
                    
                    
                    
                    <div class="col-6">
                        <h1>Mais Informações</h1>
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