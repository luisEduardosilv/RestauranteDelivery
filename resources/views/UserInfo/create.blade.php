@extends('layouts/app')

@section('content')
    <div class="container">
        @if ( isset($message) )
            <div class="alert alert-{{$message[1]}} alert-dismissible fade show" role="alert">
                {{$message[0]}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
        @endif
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão --}}
        {{-- encaminhados --}}
        {{-- {{route("userinfo.store")}} == /userinfo --}}
        <form method="POST" action="{{route("userinfo.store")}}">
            @csrf
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="#" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-profileImg" class="form-label">Profile Img</label>
                <input name="profileImg" type="text" class="form-control" id="id-input-profileImg" placeholder="Digite o caminho para a imagem.">
            </div>
            <div class="mb-3">
                <label for="id-input-status" class="form-label">Status</label>
                <input type="text" class="form-control" id="id-input-status" aria-describedby="id-help-status" value="#" disabled>
                <div id="id-help-status" class="form-text">O status não é controlado pelo usuário.</div>
            </div>
            <div class="mb-3">
                <label for="id-input-dataNasc" class="form-label">Data de Nascimento</label>
                <input name="dataNasc" type="text" class="form-control" id="id-input-dataNasc" placeholder="Digite a data de nascimento.">
            </div>
            <div class="mb-3">
                <label for="id-input-genero" class="form-label">Gênero</label>
                <input name="genero" type="text" class="form-control" id="id-input-genero" placeholder="Digite o gênero.">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route("home")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection