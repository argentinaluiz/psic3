<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painel\Product;
use App\Models\Painel\Imagem;

class ShopController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $products = Product::inRandomOrder()->get();
       $products = Product::all();
       return view('shop', compact('products'));
      //  return view('shop')->with(['product' => $product]);
       // return view('shop', compact('product'));
    }


    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $imagem = $product->imagens()->get();
        $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

       return view('product')->with([
            'product' => $product,
            'imagem' => $imagem,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

   
}
