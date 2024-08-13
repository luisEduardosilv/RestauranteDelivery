@extends('layouts/app')

@section('content')
    <div class="container">
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão --}}
        {{-- encaminhados --}}
        <form method="POST" action="{{route("endereco.update", $endereco->id)}}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="{{$endereco->id}}" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-bairro" class="form-label">Bairro</label>
                <input name="bairro" type="text" class="form-control" id="id-input-bairro" placeholder="Digite a bairro. Ex: 'Centro'." value="{{$endereco->bairro}}">
            </div>
            <div class="mb-3">
                <label for="id-input-logradouro" class="form-label">Logradouro</label>
                <input name="logradouro" type="text" class="form-control" id="id-input-logradouro" placeholder="Digite a loragradouro. Ex: 'Rua Sete de Setembro'." value="{{$endereco->logradouro}}">
            </div>
            <div class="mb-3">
                <label for="id-input-numero" class="form-label">Número</label>
                <input name="numero" type="text" class="form-control" id="id-input-numero" placeholder="Digite o numero. Ex: '111'." value="{{$endereco->numero}}">
            </div>
            <div class="mb-3">
                <label for="id-input-complemento" class="form-label">Complemento</label>
                <input name="complemento" type="text" class="form-control" id="id-input-complemento" placeholder="Digite o complemento. Ex: 'Apto. 101'." value="{{$endereco->complemento}}">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route("endereco.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection