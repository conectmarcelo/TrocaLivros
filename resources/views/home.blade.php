@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="padding:0px;">
                <div class="card-header row justify-content-center" style="background-color:#6cb2eb; margin:0px 0px 10px 0px;">
                <h3>Bem Vindo, {{Auth::user()->name}}!</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <h1>Você está logado!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
