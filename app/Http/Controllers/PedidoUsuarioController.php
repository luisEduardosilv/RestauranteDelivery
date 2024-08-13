<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PedidoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("PedidoUsuario/index");
    }

    /**
     * Retorna os produtos de um TipoProdutoId informado.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProdutos($id){
        // Se o ID informado for igual a 0, significa que quer todos os produtos
        if($id == 0){
            $produtos = DB::select("SELECT Produtos.*, 
                                           Tipo_Produtos.descricao 
                                    FROM Produtos
                                    JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
        }
        // Se não, significa que quer um produto de um tipo específico
        else{
            $produtos = DB::select("SELECT Produtos.*, 
                                           Tipo_Produtos.descricao 
                                    FROM Produtos
                                    JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id
                                    WHERE Produtos.Tipo_Produtos_id = ?", [$id]);
        }
        // Construção da resposta (criação do array $response)
        $response["message"] = "Consulta realizada com sucesso";
        $response["success"] = true;
        // response.return = array
        $response["return"] = $produtos;
        
        return response()->json($response, 201);
    }
}
