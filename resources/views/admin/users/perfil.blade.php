@extends('layouts.app')
@section('content')




<div class="container">
        
    @foreach ($user ?? '' as $u)
    
    <form action="{{route('user.update.perfil', ['user' => $u->id])}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row col-12">
    <div class="col-4">
    <h1>Perfil</h1><br>
    </div>
     
    </div>
    
    
        <div class="row col-12">
        
            <div class="col-4">
                <img src="{{asset('/images/'. $u->ds_foto)}}" alt="foto" style=" with:200px; height:200px;">
            
                <div class="form-group">
                   <input type="file" name="ds_foto" id="ds_foto" required><br><br>
                    <button type="submit" class="btn btn-lg btn-primary">Atualizar</button>
                </div>
            
            </div>

            <div class="col-4">
                <h1>Meus Dados</h1>

                <div class="row">
                
                    <div class="form-group col-12">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control col" id="name" name="name" value="{{$u->name}}">
                    </div>

                </div>

                <div class="row">
                
                    <div class="form-group col-6">
                        <label for="dt_nascimento">Data Nascimento</label>
                        <input type="date" class="form-control col" id="dt_nascimento" name="dt_nascimento" value="{{$u->dt_nascimento}}">
                    </div>

                    <div class="form-group col-6">
                        <label for="ds_telefone">Telefone</label>
                        <input type="text" class="form-control col" id="ds_telefone" name="ds_telefone" value="{{$u->ds_telefone}}">
                    </div>
                
                </div>
                
                
                
                <div class="row">
                    
                    <div class="form-group col">
                        <label for="email">Email</label>
                        <input type="text" class="form-control col" id="email" name="email" value="{{$u->email}}">
                    </div>
                </div>
            </div>
            
        
            <div class="col-4">
                <h1>Meu Endereço</h1>
          
                <div class="row">
                    <div class="form-group col-8">
                        <label for="ds_logradouro">Endereço</label>
                        <input type="text" class="form-control col" id="ds_logradouro" name="ds_logradouro" value="{{$u->ds_logradouro}}">
                    </div>

                    <div class="form-group col-4">
                        <label for="ds_numero_logradouro">Número</label>
                        <input type="text" class="form-control col" id="ds_numero_logradouro" name="ds_numero_logradouro" value="{{$u->ds_numero_logradouro}}">
                    </div>
                
                </div>    

                <div class="row">

                    <div class="form-group col-4">
                        <label for="ds_bairro">Bairro</label>
                        <input type="text" class="form-control col" id="ds_bairro" name="ds_bairro" value="{{$u->ds_bairro}}">
                    </div>

                    <div class="form-group col-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control col" id="ds_cidade" name="ds_cidade" value="{{$u->ds_cidade}}">
                    </div>
                    
                    <div class="form-group col-4">
                        <label for="ds_uf">UF</label>
                        <select name="ds_uf" class="form-control">
                            <option >{{$u->ds_uf}}</option>
                            <option value="SP">SP</option>
                            <option value="RJ">RJ</option>
                            <option value="MG">MG</option>
                            <option value="BA">BA</option>
                        </select>
                    </div>
  
                </div>


                <div class="row">

                    <div class="form-group col">
                        <label for="cd_cep">CEP</label>
                        <input type="text" class="form-control" id="cd_cep" name="cd_cep" value="{{$u->cd_cep}}">
                    </div>
                  
                </div>     
                
            </div>
            
        
        </div>

        
    </form>
    
</div>

















@endforeach


            
    @endsection