@extends('layouts/app')

@section('content')
    <script src="{{ asset("js/pedidoUsuario.js") }}"></script>
    <div class="container">
        {{-- Parte superior --}}
        <div>
            <h1 class="text-center">Faça seu pedido</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filtro de nome de produto">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="id-button-busca">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select" id="id-select-filtro-tipo">
                        <option value="0">Tudo</option>
                        <option value="1">Pizza</option>
                        <option value="2">Suco</option>
                        <option value="3">Cerveja</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- Parte meio --}}
        <div id="id-div-lista-produto">
        </div>
        {{-- Parte inferior --}}
        <div class="my-4 border border-dark">
            <div class="m-3">
                <h4>Itens do pedido</h4>
            </div>
            <div class="m-3">
                <table class="table text-center">
                    <tbody id="id-tbody-itens-pedido"></tbody>
                </table>
            </div>
            <div class="m-3">
                <a href="#" class="btn btn-primary w-100">Próximo</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="id-edit-modal" tabindex="-1" aria-labelledby="id-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id-modal-label">Editar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row m-3 border border-dark">
                        <div class="col-md-3 my-auto">
                            <img id="id-modal-img-produto" class="w-100" src="" alt="">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h5 id="id-modal-nome-produto">PRODUTO NOME</h5>
                            <h6>Ingredientes</h6>
                            <p id="id-modal-ingredientes-produto">asdasdasdasdasd asdasdasd asdasda sdasdasdasdas dasdasdas</p>
                        </div>
                        <div class="col-md-3 my-auto">
                            <div class="my-3">
                                <label for="id-modal-preco-produto">Preço Unitário</label>
                                <input id="id-modal-preco-produto" type="text" class="form-control">
                            </div>
                            <div class="my-3">
                                <input id="id-modal-quant-produto" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="id-modal-btn-atualizar-produto" class="btn btn-secondary" data-bs-dismiss="modal">Atualizar</a>
                </div>
            </div>
        </div>
    </div>
@endsection