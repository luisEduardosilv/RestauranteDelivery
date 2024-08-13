// executa o JS depois de todo HTML ser carregado
$(document).ready(function () {
    // Criando um vetor global para esse arquivo
    // Esse vetor conterá os produtos adicionados no carrinho de compras
    let vetorProdutosAdicionados = [];

    function groupBy(arr, property) {
        return arr.reduce(function (anterior, atual) {
            if (!anterior[atual[property]]) {
                anterior[atual[property]] = [];
            }
            anterior[atual[property]].push(atual);
            return anterior;
        }, []);
    }

    const selectFiltroTipo = $("#id-select-filtro-tipo");

    selectFiltroTipo.on("change", function () {
        updateProdutos();
    });

    function updateProdutos() {
        // Pego o valor da propriedade VALUE do elemento selecionando
        //  e coloco na váriavel tipoProdutoId
        const tipoProdutoId = selectFiltroTipo.val();
        //console.log(tipoProdutoId);
        $.ajax({
            type: "GET",
            url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function (response) {
                produtos_group = groupBy(response.return, "Tipo_Produtos_id");
                //console.log(produtos_group);
                showUpdatedProdutos(produtos_group);
                // Buscando todos os botões de adicionar produto
                const arrayBtnAddProduto = $(".btn-add-produto");
                // Faço o forEach no array e chamo a posição corrente de btnAddProduto
                arrayBtnAddProduto.each(function (position, btnAddProduto) {
                    btnAddProduto.addEventListener("click", addProdutoNoPedido);
                });
            },
            error: function (error) {
                console.log("caiu no erro");
                console.log(error);
            }
        });
    }

    function addProdutoNoPedido() {
        const idProdutoAdionado = this.getAttribute("value");
        const idTipoProdutoAdicionado = this.getAttribute("value-tipo");
        const quantProdutoAdicionado = $(`#id-quant-produto-${idProdutoAdionado}`).val();
        const produto = produtos_group[idTipoProdutoAdicionado].find(obj => obj.id == idProdutoAdionado);
        console.log(produto);
        // Verifico se a quantidade de produtos que estou tentando adicionar é positiva.
        if (quantProdutoAdicionado > 0) {
            vetorProdutosAdicionados[idProdutoAdionado] = {
                id: produto.id,
                urlImage: produto.urlImage,
                descricao: produto.descricao,
                nome: produto.nome,
                quantProdutoAdicionado: quantProdutoAdicionado,
                preco: produto.preco,
                ingredientes: produto.ingredientes,
            };
            console.log(vetorProdutosAdicionados);
            // Apagar toda a tabela e utilizar o vetor "vetorProdutosAdicionados" para reimprimir as informações.
            updateTabelaItensPedido(vetorProdutosAdicionados);
            $(this).hide(20).show(20).hide(20).show(20);
        }
    }

    function updateTabelaItensPedido(vetorProdutosAdicionados) {
        // Seleciono o local onde irei manipular o HTML
        const tabela = $("#id-tbody-itens-pedido");
        // Apago as informações dentro desse local
        tabela.html("");
        // Percorro o vetor e imprimo as informações na tela
        vetorProdutosAdicionados.forEach(produto => {
            if (produto) {
                tabela.append(`
                    <tr>
                        <td>
                            <span>${produto.descricao} ${produto.nome}</span>
                        </td>
                        <td>
                            <span>${produto.quantProdutoAdicionado}x</span>
                        </td>
                        <td>
                            <span>R$ ${produto.quantProdutoAdicionado * produto.preco}</span>
                        </td>
                        <td>
                            <a value="${produto.id}" class="btn btn-secondary btn-editar-tabela-produtos-adicionados" 
                            data-bs-toggle="modal" 
                            data-bs-target="#id-edit-modal">Editar</a>
                            <a value="${produto.id}" class="btn btn-danger btn-remover-tabela-produtos-adicionados">Remover</a>
                        </td>
                    </tr>
                `);           
            }
        });
        $(".btn-editar-tabela-produtos-adicionados").on("click", function () {
            //const idProduto = this.getAttribute("value");
            const idProduto = $(this).attr("value");
            console.log(vetorProdutosAdicionados[idProduto]);
            $("#id-modal-img-produto").attr("src", vetorProdutosAdicionados[idProduto].urlImage);
            $("#id-modal-nome-produto").html(vetorProdutosAdicionados[idProduto].nome);
            $("#id-modal-ingredientes-produto").html(vetorProdutosAdicionados[idProduto].ingredientes);
            $("#id-modal-preco-produto").attr("value", vetorProdutosAdicionados[idProduto].preco);
            $("#id-modal-quant-produto").attr("value", vetorProdutosAdicionados[idProduto].quantProdutoAdicionado);
        });
        $(".btn-remover-tabela-produtos-adicionados").on("click", function () {
            const idProduto = $(this).attr("value");
            vetorProdutosAdicionados[idProduto] = null;
            updateTabelaItensPedido(vetorProdutosAdicionados);
        });
    }

    function showUpdatedProdutos(produtos_group) {
        // Procuro onde quero imprimir as informações
        divProduto = $("#id-div-lista-produto");
        // Apago qualquer informação dentro do local selecionado
        divProduto.html("");
        produtos_group.forEach(produtos_tipo => {
            // Imprimir informações do tipo
            divProduto.append(`
                <div class="my-4 border border-dark">
                    <div class="m-4">
                        <h4 class="d-inline">${produtos_tipo[0].descricao}</h4>
                        <select class="float-end">
                            <option value="">Ordem do sistema</option>
                            <option value="">Menor para maior</option>
                            <option value="">Maior para menor</option>
                        </select>
                    </div>
                    <div class="my-4 produto">
                    </div>
                </div>
            `);
            produtos_tipo.forEach(produto => {
                // Imprimir as informação da variável produto
                $(".my-4.produto:last").append(`
                    <div class="row m-3 border border-dark">
                        <div class="col-md-3 my-auto">
                            <img class="w-100 h-100" src="${produto.urlImage}">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h5>${produto.nome}</h5>
                            <h6>Ingredientes:</h6>
                            <p>${produto.ingredientes}</p>
                        </div>
                        <div class="col-md-3 my-auto">
                            <div class="my-3">
                                <input type="text" class="form-control" value="R$ ${produto.preco}" readonly>
                            </div>
                            <div class="my-3">
                                <input type="number" class="form-control" id="id-quant-produto-${produto.id}" value="1">
                            </div>
                            <div class="my-3">
                                <a class="btn btn-primary w-100 btn-add-produto" value="${produto.id}" value-tipo="${produto.Tipo_Produtos_id}">Adicionar Produto</a>
                            </div>
                        </div>
                    </div>
                `);
            });
        });
    }

    // Depois de ter carregado o HTML e declarado todo compotamento do JS, executa o updateProdutos para mostrar os
    // produtos iniciais
    updateProdutos();

});
