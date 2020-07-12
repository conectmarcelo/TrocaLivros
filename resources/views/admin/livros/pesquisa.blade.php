@extends('layouts.app')



@section('content') 


<div class="container">

<h1>Incluir Livro na Minha Estante</h1>    
    <div class="row col-12 justify-content-start" >
        <form class="form-inline" method="get" action="{{route('pesquisar.livro')}}">
            {{csrf_field()}}
            <input size="50" class="form-control mr-sm-2" type="text" placeholder="Pesquise por ISBN, Título ou Autor" aria-label="Search" name="text" id="text">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
            <div></div>
        </form>

    </div>
   
    <p></p>
    <div class="form-inline justify-content-end">
        <a href="{{route('exemplar.index')}}" class="btn btn-danger">Voltar</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          Cadastrar
        </button>
        
    </div>
    <div class="card" style="height: 300px; padding: 0px; overflow-x:scroll;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>TITULO</th>
                    <th>AUTOR</th>
                    <th>ESTANTE</th>
                    
                </tr>
            </thead>
                    
            <tbody>


            @foreach ($livros as $livro)
                 <tr>
                    <td>{{$livro->cd_isbn_livro}}</td>
                    <td>{{$livro->nm_titulo_livro}}</td>
                    <td>{{$livro->nm_autor_livro}}</td>
                    <td align="center">
                    <a href="{{route('exemplar.new', ['livro'=> $livro->id])}}" class="btn  btn-sm btn-primary">Incluir</a>
                        
                    </td>
                </tr>
            @endforeach
            </tbody>
            	
                
               
        </table>
    </div>
        
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Faça uma pesquisa antes de prosseguir, você encontrou o seu livro?
      </div>
      
      <div class="modal-footer">
        <a href="{{route('livro.new')}}" class="btn btn-danger">Não</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Sim</button>
        
      </div>
    </div>
  </div>
</div>


@endsection
