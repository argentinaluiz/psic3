<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Gate;

use App\Forms\SlideForm;
use App\Models\Site\Site;
use App\Models\Painel\Product;
use App\Models\Painel\Imagem;
use App\Models\Painel\Slide;
use App\Models\Painel\Order;

class SiteController extends Controller
{
    public function index(Product $product)
    {
        //Caso a primeira página tenha um slide descomentar a linha abaixo, a linha acima que chama o Model e na view
        $slides = Slide::where('deleted','=','N')->orderBy('order')->get();
        $products = Product::where('active', true)->get();
        $imagem = Imagem::all();
        return view('site.home.index', compact('products','imagem', 'slides', 'registros'));
    }

    public function perfil()
    {
      if(Gate::denies('perfil-view')){
        abort(403,"Não autorizado!");
      }
      //Vai trazer as informações do usuário logado
      $user = Auth()->user();
      return view('site.perfil',compact('user'));
    }

    public function perfilUpdate(Request $request)
    {
      if(Gate::denies('perfil-edit')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();

      $this->validate($request,[
        'name'=>'required',
        'email'=>'required|email|unique:users,email,'.$user->id
      ]);

      $data = $request->all();

      if(isset($dados['password']) && $data['password'] != ''){
        $this->validate($request, [
          'password' => 'required|min:6|confirmed',
        ]);
        $data['password'] = bcrypt($data['password']);
      }else{
        unset($data['password']);
      }

      $user->update($data);
      return redirect()->route('site.perfil')->with('status', 'Perfil atualizado!');
    }
    
    public function favorites()
    {
      if(Gate::denies('favorites-view')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();
      $products = $user->products;
      return view('site.favorites',compact('products'));
    }

    public function favoritesCreate(Product $product)
    {
      if(Gate::denies('favorites-create')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();
      $user->products()->attach($product);

      return redirect()->back();
    }

    public function favoritesDelete(Product $product)
    {
      if(Gate::denies('favorites-delete')){
        abort(403,"Não autorizado!");
      }
      $user = Auth()->user();
      $user->products()->detach($product);

      return redirect()->back();
    }

    public function orders() {
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      // $orders=Order_products::all();
      $orders = DB::table('order_product')->leftJoin('products', 'products.id', '=', 'order_product.product_id')->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')->where('orders.user_id', '=', $user_id)->get();
      return view('site.orders', compact('orders'));
  }


}
