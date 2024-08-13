@extends('layouts/app')

@section('content')
    <div class="container">
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão --}}
        {{-- encaminhados --}}
        <form method="POST" action="{{route("tipoproduto.store")}}">
            @csrf
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="#" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-descricao" class="form-label">Descrição</label>
                <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder="Digite a descrição. Ex: 'Pizza'.">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route("tipoproduto.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection