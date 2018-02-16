<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use Illuminate\Support\Facades\Gate;

use App\Forms\SlideForm;
use App\Models\Painel\Product;
use App\Models\Painel\Imagem;
use App\Models\Painel\Slide;

class SiteController extends Controller
{
    public function index()
    {
        //Caso a primeira página tenha um slide descomentar a linha abaixo, a linha acima que chama o Model e na view
        $slides = Slide::where('deleted','=','N')->orderBy('order')->get();
        $products = Product::where('active', true)->get();
        $imagem = Imagem::all();
        return view('site.home.index', compact('products','imagem', 'slides'));
    }

    public function detail($id,$name = null)
    {
      $product = Product::find($id);

      if(str_slug($product->name) == $name){
        return view('site.home.detail',compact('product'));
      }else{
        return redirect()->route('site.home.index');
      }

    }

    public function perfil()
    {
      if(Gate::denies('perfil-view')){
        abort(403,"Não autorizado!");
      }

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

       
}
