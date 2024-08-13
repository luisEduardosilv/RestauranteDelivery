@extends('layouts/app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route("userinfo.update", $userInfo->Users_id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="{{$userInfo->Users_id}}" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" value="{{$userInfo->profileImg}}" placeholder="Digite o caminho para a imagem.">
            </div>
            <div class="mb-3">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" aria-describedby="id-help-status" value="{{$userInfo->status}}" disabled>
                <div id="id-help-status" class="form-text">O status não é controlado pelo usuário.</div>
            </div>
            <div class="mb-3">
                <label for="id-input-dataNasc" class="form-label">Data de Nascimento</label>
                <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" value="{{$userInfo->dataNasc}}" placeholder="Digite a data de nascimento.">
            </div>
            <div class="mb-3">
                <label for="id-input-genero" class="form-label">Gênero</label>
                <input name="genero" type="text" class="form-control" id="id-input-genero" value="{{$userInfo->genero}}" placeholder="Digite o gênero.">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route("userinfo.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection