<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('products-view')){
            abort(403,"Não autorizado!");
        }
        
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
        if(Gate::denies('products-create')){
            abort(403,"Não autorizado!");
        }
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
        if(Gate::denies('products-create')){
            abort(403,"Não autorizado!");
        }
        
        $data = $request->only(array_keys($request->rules()));
        $data['featured'] = $request->has('featured');
        $data['active'] = $request->has('active');

        $nameFile = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) { 
            $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();
            if (!$request->image->storeAs('products', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
        }
        if ( $this->product->newProduct($request, $nameFile) )
            return redirect()
                     ->route('painel.products.index')
                     ->with('message', 'Produto cadastrado com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao cadastrar')
                            ->withInput();

        //Product::create($request->all() + ['image'=>$nameFile] );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(Gate::denies('products-view')){
            abort(403,"Não autorizado!");
        }

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
        if(Gate::denies('products-edit')){
            abort(403,"Não autorizado!");
        }
        
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
        if(Gate::denies('products-edit')){
            abort(403,"Não autorizado!");
        }
        
        $data = $request->only(array_keys($request->rules()));
        $data['featured'] = $request->has('featured');
        $data['active'] = $request->has('active');

        $nameFile = $product->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if($product->image)
                $nameFile = $product->image;
            else
                $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('products', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

        if ( $product->updateProduct($request, $nameFile) )
            return redirect()
                            ->route('painel.products.index')
                            ->with('message', 'Produto alterado com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao atualizar')
                            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(Gate::denies('products-delete')){
            abort(403,"Não autorizado!");
        }

        $product->delete();
        return redirect()->route('painel.products.index')
            ->with('message','Produto excluído com sucesso!');
    }
}
