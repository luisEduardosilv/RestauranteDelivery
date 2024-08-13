@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="id-input-id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id-input-id" value="{{$produto->id}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="id-input-nome" value="{{$produto->nome}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-preco" class="form-label">Preço</label>
            <input type="text" class="form-control" id="id-input-preco" value="{{$produto->preco}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-select-Tipo_Produtos_id" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="id-select-Tipo_Produtos_id" value="{{$produto->descricao}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
            <input type="text" class="form-control" id="id-input-ingredientes" value="{{$produto->ingredientes}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-urlImage" class="form-label">Url Image</label>
            <input type="text" class="form-control" id="id-input-urlImage" value="{{$produto->urlImage}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-updated_at" class="form-label">Updated At</label>
            <input type="text" class="form-control" id="id-input-updated_at" value="{{$produto->updated_at}}" disabled>
        </div>
        <div class="mb-3">
            <label for="id-input-created_at" class="form-label">Created At</label>
            <input type="text" class="form-control" id="id-input-created_at" value="{{$produto->created_at}}" disabled>
        </div>
        <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
    </div>
@endsection