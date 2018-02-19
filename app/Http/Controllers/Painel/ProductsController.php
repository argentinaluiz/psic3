<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\ProductForm;
use App\Forms\GalleryForm;
use App\Models\Painel\Product;
use App\Models\Painel\Imagem;
use App\Models\Painel\Gallery;

class ProductsController extends Controller
{
    
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

        $products = Product::paginate(10); //Caso não use o método paginate, mas all... na view fica apenas Table::withContents($users()), sem o ->items 
        return view('painel.products.index', compact('products', 'totalProducts'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   
    {
        if(Gate::denies('products-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(ProductForm::class, [
          'url' => route('products.store'),
          'method' => 'POST'
        ]);
        
      return view('painel.products.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if(Gate::denies('products-create')){
            abort(403,"Não autorizado!");
        }
        /** @var Form $form */
        $form = \FormBuilder::create(ProductForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                    ->withInput();
        }

        $data = $form->getFieldValues();
        $result = Product::create($data);
        $request->session()->flash('message','Produto criado com sucesso');

        return redirect()->route('products.index');
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
        $form = \FormBuilder::create(ProductForm::class, [
          'url' => route('products.update',['product' => $product->id]),
          'method' => 'PUT',
          'model' => $product
        ]);

      return view('painel.products.edit', compact('form'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Painel\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        if(Gate::denies('products-edit')){
            abort(403,"Não autorizado!");
        }
        
          /** @var Form $form */
        $form = \FormBuilder::create(ProductForm::class, [
            'data' => ['id' => $product->id]
        ]);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $product->update($data);
        session()->flash('message','Produto editado com sucesso');
        return redirect()->route('products.index');
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
 
        foreach ($product->imagens as $key => $value) {
          $value->delete();
        }

        $product->delete();
        session()->flash('message','Produto excluído com sucesso');
        return redirect()->route('products.index');
    }

   

    public function indexGallery(Product $product)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }

      $form = \FormBuilder::create(ProductForm::class, [
        'url' => route('products.update',['product' => $product->id]),
        'method' => 'PUT',
        'model' => $product
      ]);
      $registros = $product->imagens()->where('deleted','=','N')->orderBy('order')->paginate(10);

      return view('painel.products.gallery',compact('registros','product', 'form'));
    }

    public function createGallery(Product $product)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }

      if($product->imagens()->where('deleted','=','N')->count()){
        $imagensProduct = $product->imagens()->where('deleted','=','N')->get();
      }else{
        $imagensProduct = null;
      }

      $imagens = Imagem::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);

      return view('painel.products.imagens',compact('imagens','product','imagensProduct'));
    }

    public function storeGallery(Request $request)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }

      $data = $request->all();

      $product = Product::find($data['product']);
      $imagem = Imagem::find($data['id']);

      $order= 1;
      if($product->imagens()->where('deleted','=','N')->count()){
        $aux = $product->imagens()->where('deleted','=','N')->orderBy('order','DESC')->first();
        $order = $aux->order + 1;
      }

      if($product->imagens()->where('imagem_id','=',$imagem->id)->count()){
        $aux = $product->imagens()->where('imagem_id','=',$imagem->id)->first();
        $aux->update(['deleted'=>'N','order'=>$order]);
      }else{
        $product->imagens()->create(['imagem_id'=>$imagem->id ,'url'=>$imagem->galeriaUrl(), 'order'=> $order]);
      }

      return $product->imagens;
    }

    public function removeGallery(Request $request)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }
      $data = $request->all();

      $product = Product::find($data['product']);
      $imagem = Imagem::find($data['id']);

      if($product->imagens()->where('imagem_id','=',$imagem->id)->count() > 1){
        $galleries = $product->imagens()->where('imagem_id','=',$imagem->id)->get();
        foreach ($galleries as $gallery) {
          $gallery->update(['deleted'=>'S']);
        }
      }else{
        $gallery = $product->imagens()->where('imagem_id','=',$imagem->id)->first();
        $gallery->update(['deleted'=>'S']);
      }

      return $product->imagens;
    }

    public function editGallery(Gallery $gallery)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }

      $registro = $gallery;
      $product = $gallery->product;

      return view('painel.products.gallery.edit',compact('registro'));
    }

    public function updateGallery(Request $request, Gallery $gallery)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }

        $this->validate($request, [
          'order' => 'required|numeric',
         ]);

          $data = $request->all();
          $registro = $gallery;
          $product = $gallery->product;

          $registro->update($request->all());
          session()->flash('message','Galeria editada com sucesso');
          return redirect()->route('products.gallery', $product);

      }

    public function deleteGallery(Request $request,Gallery $gallery)
    {
      if(Gate::denies('products-edit')){
        abort(403,"Não autorizado!");
      }

      $gallery->update(['deleted'=>'S']); 
      session()->flash('message','Galeria excluída com sucesso');
      return redirect()->back();
    }

}
