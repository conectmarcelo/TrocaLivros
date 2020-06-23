@extends('layouts.app')
@section('content')

<div class="container">
    @foreach ($trocas as $t)
        <div class="card col-12">
           <div class="card-body">
            @if($t->userA->id == Auth::user()->id)

                <div class="row">
                    <div class=col-2>
                        @if($t->exemplarA->fotos()->count())
                        <img src="{{asset('/images/'. $t->exemplarA->fotos()->first()->foto)}}" class="card-img-top" alt="livro" style="height:180px">
                        @endif
                    </div>
                    <div class="col-2">
                        <h1>Enviei</h1>
                    </div>
                    <div class="col-4 ">
                            <div class="row justify-content-center">
                                <img src="{{asset('/logotipo/logotipo1.png')}}" alt="logo" class="w-50"style="padding:0px;">
                            </div>
                            <div class="row justify-content-center">
                                <h1>Troca:{{$t->id}}</h1>
                            </div>
                            <div class="row justify-content-center">
                                <h3>{{$t->updated_at->format('d/m/y')}}</h3>
                            </div>
                    </div>
                    <div class="col-2">
                        <h1>Recebi</h1>
                        <p>{{$t->userB->name}}</p>
                        <p>{{$t->userB->ds_cidade}} / {{$t->userA->ds_uf}}</p>
                        <p>{{$t->userB->ds_telefone}}</p>
                        <p>{{$t->userB->email}}</p>
                    </div>
                    <div class="col-2">
                        
                        @if($t->exemplarB->fotos()->count())
                        <img src="{{asset('/images/'. $t->exemplarB->fotos()->first()->foto)}}" class="card-img-top" alt="livro" style="height:180px">
                        @endif
                    </div>
                </div>
            
            @else
  
                <div class="row">
                    <div class=col-2>
                        @if($t->exemplarB->fotos()->count())
                        <img src="{{asset('/images/'. $t->exemplarB->fotos()->first()->foto)}}" class="card-img-top" alt="livro" style="height:180px">
                        @endif
                    </div>
                    <div class="col-2">
                        <h1>Enviei</h1>
                    </div>
                    <div class="col-4 ">
                            <div class="row justify-content-center">
                                <img src="{{asset('/logotipo/logotipo1.png')}}" alt="logo" class="w-50"style="padding:0px;">
                            </div>
                            <div class="row justify-content-center">
                                <h1>Troca:{{$t->id}}</h1>
                            </div>
                            <div class="row justify-content-center">
                                <h3>{{$t->updated_at->format('d/m/y')}}</h3>
                            </div>
                    </div>
                    <div class="col-2">
                        <h1>Recebi</h1>
                        <p>{{$t->userA->name}}</p>
                        <p>{{$t->userA->ds_cidade}} / {{$t->userA->ds_uf}}</p>
                        <p>{{$t->userA->ds_telefone}}</p>
                        <p>{{$t->userA->email}}</p>
                        
                    </div>
                    <div class="col-2">
                        @if($t->exemplarA->fotos()->count())
                        <img src="{{asset('/images/'. $t->exemplarA->fotos()->first()->foto)}}" class="card-img-top" alt="livro" style="height:180px">
                        @endif
                    </div>
                </div>
            @endif     









                
            </div>
        </div>
    @endforeach   
</div>
@endsection
