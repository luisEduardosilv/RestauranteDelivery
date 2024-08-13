@extends('layouts/app')

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/pedidoAdmin.css') }}">
    <script src="{{ asset('/js/pedidoAdmin.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container">
        <div class="row">

            {{-- Parte da esquerda --}}
            <div class="col-md-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary w-100">Voltar</a>
                <div id="list-pedidos" class="list-group my-3 overflow-auto">
                </div>
            </div>

            {{-- Parte do meio --}}
            <div class="col-md-6">
                <h2 id="id-h2-pedido" class="text-center">Selecione o pedido</h2>
                <div id="list-produtos" class="list-group my-3 overflow-auto">

                </div>
                <div class="input-group my-3">
                    <input type="text" class="form-control" value="Valor total do pedido" readonly>
                    <span class="input-group-text">R$</span>
                    <span class="input-group-text">100,00</span>
                </div>
            </div>

            {{-- Parte da direita --}}
            <div class="col-md-3">
                <select name="" id="id-select-tipo-produtos" class="form-select my-1">
                </select>
                <select name="" id="" class="form-select my-1">
                    <option value="1">Pepperoni</option>
                    <option value="4">Bacon</option>
                </select>
                <input type="number" name="" id="" class="form-control text-end my-1" value="1">
                <a href="#" id="id-btn-add-produto" class="btn btn-secondary w-100 my-1">Adicionar Produto</a>
                <select name="" id="" class="form-select my-1">
                    <option value="1">Rua A</option>
                    <option value="2">Rua B</option>
                </select>
                <a href="#" id="id-btn-confirmar-pedido" class="btn btn-warning w-100 my-1 class-btn-acao-pedido">Confirmar Pedido</a>
                <a href="#" id="id-btn-imprimir-comandas" class="btn btn-primary w-100 my-1 class-btn-acao-pedido">Imprimir Comandas</a>
                <a href="#" id="id-btn-cancelar-pedido" class="btn btn-danger w-100 my-1 class-btn-acao-pedido">Cancelar Pedido</a>
                <a href="#" id="id-btn-finalizar-pedido" class="btn btn-success w-100 my-1 class-btn-acao-pedido">Finalizar Pedido</a>
            </div>
        </div>
    </div>
@endsection
