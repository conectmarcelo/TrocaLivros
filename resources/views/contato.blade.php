@extends('layouts.app')

@section('content')

<div class="container">


<div class="row" >
    <form class="col-6" method="get" action="{{route('single.livros')}}">
  
        <div class="form-group" style="position: relative;left: 55%;">
            <label for="exampleInputPassword1">Nome:</label>
            <input type="text" class="form-control" id="exampleInputNome1" placeholder="Seu Nome" required>
        </div>
        <div class="form-group" style="position: relative;left: 55%;">
            <label for="exampleInputEmail1"> E-mail: </label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu e-mail" reuired>
        </div>
        <div style="position: relative;left: 55%;">
            <textarea style="resize: none" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escreva aqui sua sugestãõ/critica." reuired></textarea>
        </div>
        <div class="form-check" style="position: relative;left: 55%;">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Aceito receber uma resposta por e-mail</label>
        </div>
        <br>
        <div style="position: relative;left: 100%;" >
            <button type="reset" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Enviar </button>
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
                        Mensagem enviada com sucesso! Em breve responderemos.
                    </div>
                
                </div>
            </div>
        </div>




    </form>
</div>

</div>



@endsection
