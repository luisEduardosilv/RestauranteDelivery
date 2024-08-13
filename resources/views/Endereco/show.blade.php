@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="{{$endereco->id}}" disabled>
            <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
        </div>
        <div class="mb-3">
            <label for="id-input-bairro" class="form-label">Bairro</label>
            <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Digite a bairro. Ex: 'Centro'." value="{{$endereco->bairro}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-logradouro" class="form-label">Logradouro</label>
            <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Digite a loragradouro. Ex: 'Rua Sete de Setembro'." value="{{$endereco->logradouro}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-numero" class="form-label">Número</label>
            <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Digite o numero. Ex: '111'." value="{{$endereco->numero}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-complemento" class="form-label">Complemento</label>
            <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Digite o complemento. Ex: 'Apto. 101'." value="{{$endereco->complemento}}" disabled>
        </div>
        <a href="{{route("endereco.index")}}" class="btn btn-primary">Voltar</a>
    </div>
@endsection