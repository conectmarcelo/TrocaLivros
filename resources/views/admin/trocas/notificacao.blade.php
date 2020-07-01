@extends('layouts.app')
@section('content')

<div class="container">

    
    @foreach ($trocas as $t)
        <div class="card col-12">
           <div class="card-body">
              <div class="row">
                  <div class=col-10>
                  
                    <table class="table table">
                        <thead>
                            <tr>
                                <h5 class="card-title">Notificação: {{$t->id}}</h3>
                                <th>Livro Solicitado</th>
                                <th>Escolher da Estante</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                
                                <td >{{$t->exemplarB->livro->nm_titulo_livro}}</td>
                                <td ><a href="{{route('troca.estante', ['user'=> $t->userA->id, 'trocaId'=> $t->id ])}}">{{$t->userA->name}}</a></td>
                                <td >{{$t->ds_status_troca}}</td>
                                
                            </tr>
                        
                        </tbody>
                    </table>

                    
                  
                  <a href="{{route('troca.recusar', ['trocaId'=> $t->id ])}}" class="btn btn-sm btn-outline-danger" >Recusar</a> 
                    
                 
                </div>
        
                <div class="col-2">
                
                  @if($t->exemplarB->fotos()->count())
                      <img src="{{asset('/images/'. $t->exemplarB->fotos()->first()->foto)}}" class="card-img-top" alt="livro" style="height:180px">
                  @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach   

</div>
@endsection