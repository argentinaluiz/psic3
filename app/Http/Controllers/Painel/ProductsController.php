<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('painel.products.index', compact('products'));
    }

    public function adicionar()
    {
        return view('painel.products.adicionar');
    }

    public function editar($id)
    {
        $registro = Product::find($id);
        if( empty($registro->id) ) {
            return redirect()->route('painel.products');
        }
        return view('painel.products.editar', compact('registro'));
    }

    public function show($id)
    {
        $registro = Product::find($id);
        if( empty($registro->id) ) {
            return redirect()->route('painel.products.index');
        }
        return view('painel.products.editar', compact('registro'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        Product::create($dados);

        $req->session()->flash('painel-mensagem-sucesso', 'Produto cadastrado com sucesso!');

        return redirect()->route('painel.products.index');
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        Product::find($id)->update($dados);

        $req->session()->flash('painel-mensagem-sucesso', 'Produto atualizado com sucesso!');

        return redirect()->route('painel.products.index');
    }

    public function deletar($id)
    {

        Product::find($id)->delete();

        $req->session()->flash('painel-mensagem-sucesso', 'Produto deletado com sucesso!');

        return redirect()->route('painel.products.index');
    }
}
