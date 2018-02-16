<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Kris\LaravelFormBuilder\Form;
use App\Forms\SlideForm;

use App\Models\Painel\Slide;
use App\Models\Painel\Imagem;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('slides-view')){
            abort(403,"Não autorizado!");
        }

        $slides = Slide::where('deleted','=','N')->orderBy('order')->paginate(5);
        return view('painel.slides.index',compact('slides', 'form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('slides-create')){
            abort(403,"Não autorizado!");
        }

        if(Slide::where('deleted','=','N')->count()){
            $imagensSlide = Slide::where('deleted','=','N')->get();
          }else{
            $imagensSlide = null;
          }
    
          $imagens = Imagem::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);
    
          return view('painel.slides.imagens',compact('imagens','imagensSlide'));
    }

    public function storeSlide(Request $request)
    {
      if(Gate::denies('slides-edit')){
        abort(403,"Não autorizado!");
      }

      $data = $request->all();
      $imagem = Imagem::find($data['id']);

      $order= 1;
      if(Slide::where('deleted','=','N')->count()){
        $aux = Slide::where('deleted','=','N')->orderBy('order','DESC')->first();
        $order = $aux->order + 1;
      }

      if(Slide::where('imagem_id','=',$imagem->id)->count()){
        $aux = Slide::where('imagem_id','=',$imagem->id)->first();
        $aux->update(['deleted'=>'N','order'=>$order]);
      }else{
        Slide::create(['imagem_id'=>$imagem->id ,'link'=>'', 'order'=> $order]);
      }

      return Slide::all();
    }

    public function removeSlide(Request $request)
    {
      if(Gate::denies('slides-edit')){
        abort(403,"Não autorizado!");
      }

      $data = $request->all();
      $imagem = Imagem::find($data['id']);

      if(Slide::where('imagem_id','=',$imagem->id)->count() > 1){
        $galleries = Slide::where('imagem_id','=',$imagem->id)->get();
        foreach ($galleries as $gallery) {
          $gallery->update(['deleted'=>'S']);
        }
      }else{
        $gallery = Slide::where('imagem_id','=',$imagem->id)->first();
        $gallery->update(['deleted'=>'S']);
      }

      return Slide::all();
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        if(Gate::denies('slides-edit')){
            abort(403,"Não autorizado!");
        }

        $registro = $slide;
        return view('painel.slides.edit',compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        if(Gate::denies('slides-edit')){
            abort(403,"Não autorizado!");
        }

        $this->validate($request, [
            'order' => 'required|numeric',
        ]);

        $data = $request->all();
        $registro = $slide;

        $registro->update($request->all());
        return redirect()->route('slides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        if(Gate::denies('slides-delete')){
            abort(403,"Não autorizado!");
        }

        $slide->update(['deleted'=>'S']);
        return redirect()->back();
    }
}
