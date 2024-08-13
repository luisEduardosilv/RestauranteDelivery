@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="{{$tipoProduto->id}}" disabled>
            <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
        </div>
        <div class="mb-3">
            <label for="id-input-descricao" class="form-label">Descrição</label>
            <input name="descricao" type="text" class="form-control" id="id-input-descricao" placeholder="Digite a descrição. Ex: 'Pizza'." value="{{$tipoProduto->descricao}}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{route("tipoproduto.index")}}" class="btn btn-primary">Voltar</a>
    </div>
@endsection