<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use DB;

class PedidoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("PedidoAdmin/index");
    }

    /**
     * Retorna a lista de todos os pedidos do banco de dados no formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function getPedidos(){
        // Lebrar de dar o use App\Models\Pedido;
        $pedidos = Pedido::orderByDesc('id')->get();
        //$pedidos = DB::select('SELECT * FROM Pedidos ORDER BY Pedidos.id DESC' );
        $response["success"] = true;
        $response["message"] = "Consulta de Pedidos realizada com sucesso";
        $response["return"] = $pedidos;
        return response()->json($response, 200);
    }

    /**
     * Retorna a lista de todos os tipos de produto do banco de dados no formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function getTipoProdutos(){
        // Lebrar de dar o use App\Models\Pedido;
        $tipoProdutos = DB::select('SELECT * FROM Tipo_Produtos');
        $response["success"] = true;
        $response["message"] = "Consulta de Pedidos realizada com sucesso";
        $response["return"] = $tipoProdutos;
        return response()->json($response, 200);
    }

    /**
     * Retorna a lista de todos os tipos de produto do banco de dados no formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function getPedidoProdutos($id){
        // Lebrar de dar o use App\Models\Pedido;
        $pedidoProdutos = DB::select("SELECT Tipo_Produtos.descricao,
                                           Produtos.nome,
                                           Pedido_Produtos.quantidade
                                    FROM Pedido_Produtos
                                    JOIN Produtos on Pedido_Produtos.Produtos_id = Produtos.id
                                    JOIN Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                    WHERE Pedidos_id = ?", [$id]);
        $response["success"] = true;
        $response["message"] = "Consulta de Produtos dentro de Pedido realizada com sucesso";
        $response["return"] = $pedidoProdutos;
        return response()->json($response, 200);
    }

    public function updatePedido(Request $request, $id){
        $pedido = Pedido::find($id);
        if(isset($pedido)){
            $pedido->status = $request->status;
            $pedido->update();
        }
        $response["success"] = true;
        $response["message"] = "pedido atualizado com sucesso";
        $response["return"] = $pedido;
        return response()->json($response, 200);
    }

}
