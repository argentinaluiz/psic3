<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProducts   = Product::count();

        \Session::flash('chave','valor');
        $products = Product::all();
        return view('painel.products.index', compact('products', 'title', 'totalProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('painel.products.create', ['product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {        
        $data = $request->only(array_keys($request->rules()));
        $data['active'] = $request->has('active');

        $pure_name="";
        if($request->hasFile('file')){
            $file_name=$request->file->store('public/uploads/products');
            $pure_name = basename($file_name);
        }


        Product::create($request->all() + ['image_url'=>$pure_name] );

       //Product::create($data);
        return redirect()->route('painel.products.index')
            ->with('message','Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('painel.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('painel.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['active'] = $request->has('active');
        $product->fill($data);
        $product->save();
        return redirect()->route('painel.products.index')
            ->with('message','Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('painel.products.index')
            ->with('message','Produto excluído com sucesso!');
    }
}
