@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            <h1>Cadastro de Fotos livros</h1>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{route('livro.foto.save', ['livro' => $livro_id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Carregar Fotos</label>
                    <input type="file" name="fotos[]" multiple>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-success">Enviar Fotos</button>
                    <a href="{{route('livro.index')}}" class="btn btn-lg btn-danger">Cancelar</a>
                </div>
            </form>
            <div class="row">

            @foreach($fotos as $foto)
            <div class="card col-2">
            <img src="{{asset('/images/'. $foto->foto)}}" alt="foto" style=" with:200px; height:200px;"><br>
            <a href="{{route('livro.foto.delete', ['foto'=> $foto->id, 'livro'=>$livro_id])}}" class="btn btn-sm btn-outline-danger">Excluir</a>
            </div>
            @endforeach

            
            
            </div>

        </div>
    </div>
@endsection