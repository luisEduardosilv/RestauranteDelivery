@extends('layouts/app')

@section('content')
    <div class="container">
        {{-- METHOD E ACTION especificam para onde os dados do formulário serão --}}
        {{-- encaminhados --}}
        <form method="POST" action="{{route("produto.store")}}">
            @csrf
            <div class="mb-3">
                <label for="id-input-id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id-input-id" aria-describedby="id-help-id" value="#" disabled>
                <div id="id-help-id" class="form-text">Não é necessário informor um ID para cadastrar um novo dado</div>
            </div>
            <div class="mb-3">
                <label for="id-input-nome" class="form-label">Nome</label>
                <input name="nome" type="text" class="form-control" id="id-input-nome" placeholder="Digite a nome. Ex: 'Pepperoni'.">
            </div>
            <div class="mb-3">
                <label for="id-input-preco" class="form-label">Preço</label>
                <input name="preco" type="text" class="form-control" id="id-input-preco" placeholder="Digite a preço. Ex: '50.50'.">
            </div>
            <div class="mb-3">
                <label for="id-select-Tipo_Produtos_id" class="form-label">Tipo</label>
                <select name="Tipo_Produtos_id" id="id-select-Tipo_Produtos_id" class="form-select">
                    @foreach ($tipoProdutos as $tipoProduto)
                        <option value="{{$tipoProduto->id}}">{{$tipoProduto->descricao}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id-input-ingredientes" class="form-label">Ingredientes</label>
                <input name="ingredientes" type="text" class="form-control" id="id-input-ingredientes" placeholder="Digite os ingredientes. Ex: 'Massa, molho de tomate, queijo, ...'.">
            </div>
            <div class="mb-3">
                <label for="id-input-urlImage" class="form-label">Url Image</label>
                <input name="urlImage" type="text" class="form-control" id="id-input-urlImage" placeholder="Digite a Url Image. Ex: '/img/Pizza/pizza-pepperoni'.">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{route("produto.index")}}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
@endsection