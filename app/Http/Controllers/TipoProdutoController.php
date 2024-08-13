<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mostra uma lista de todos os recursos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipoProdutos = DB::select('select * from Tipo_Produtos');
            return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos);
        } catch (\Throwable $th) {
            return view("TipoProduto/index")->with("tipoProdutos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    public function indexMessage($message)
    {
        try {
            $tipoProdutos = DB::select('select * from Tipo_Produtos');
            return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos)->with("message", $message);
        } catch (\Throwable $th) {
            return view("TipoProduto/index")->with("tipoProdutos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * Mostra um formulário para criação de um recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TipoProduto/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tipoProduto = new TipoProduto();
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
            return $this->indexMessage(["TipoProduto cadastrado com sucesso", "success"]);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if( isset($tipoProduto) ){
                return view("TipoProduto/show")->with("tipoProduto", $tipoProduto);
            }
            return $this->indexMessage(["TipoProduto não encontrado", "warning"]);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if( isset($tipoProduto) ) {
                return view("TipoProduto/edit")->with("tipoProduto", $tipoProduto);
            }
            else {
                return $this->indexMessage(["TipoProduto não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            if( isset($tipoProduto) ){
                $tipoProduto->descricao = $request->descricao;
                $tipoProduto->update();
                return $this->indexMessage(["TipoProduto atualizado com sucesso", "success"]);
            }
            else{
                return $this->indexMessage(["TipoProduto não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipoProduto = TipoProduto::find($id);
            // se o produto existir
            if( isset($tipoProduto) ){
                $tipoProduto->delete();
                // recarregar a view index
                return $this->indexMessage(["TipoProduto removido com sucesso", "success"]);
            }
            else {
                return $this->indexMessage(["TipoProduto não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}
