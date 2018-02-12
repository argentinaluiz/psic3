<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Painel\Imagem;
use App\Http\Requests\ImagemRequest;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;


class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('imagens-view')){
            abort(403,"Não autorizado!");
          }
          $totalImagens = Imagem::where('deleted','=','N')->count();
          $registros = Imagem::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);

          return view('painel.imagens.index',compact('registros', 'totalImagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Gate::denies('imagens-create')){
            abort(403,"Não autorizado!");
          }
  
          return view('painel.imagens.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('imagens-create')){
          abort(403,"Não autorizado!");
        }

        if($request->hasFile('imagens')){

          $imagens = $request->imagens;

          $imagemRegras = array(
            'imagem' => 'required|image|dimensions:min_width=600,min_height=600',
          );

          foreach($imagens as $imagem){
            $imagemArray = array('imagem' => $imagem);
            $imageValidator = Validator::make($imagemArray, $imagemRegras);
            if ($imageValidator->fails()) {
              return redirect()->route('imagens.create')
                          ->withErrors($imageValidator)
                          ->withInput();
            }
          }

          foreach ($imagens as $imagem) {
            $imagem_nome = time().$imagem->getClientOriginalName();
            $imagem->move("media/img/products/",$imagem_nome);

            $tamPeq = explode("x",config('app.imagemPequena'));
            $tamG = explode("x",config('app.imagemGaleria'));
            $tamS = explode("x",config('app.imagemSlide'));

            $image1 = Image::make("media/img/products/".$imagem_nome)->fit($tamPeq[0],$tamPeq[1])->save("media/img/products/pequena-".$imagem_nome);
            $image2 = Image::make("media/img/products/".$imagem_nome)->fit($tamG[0],$tamG[1])->save("media/img/products/galeria-".$imagem_nome);
            $image3 = Image::make("media/img/products/".$imagem_nome)->fit($tamS[0],$tamS[1])->save("media/img/products/slide-".$imagem_nome);

            $auxNome = explode(".",$imagem->getClientOriginalName());
            $imagemModel = Imagem::create(["title"=>$auxNome[0],"description"=>""]);
            $imagemModel->files()->create(["url"=>"media/img/products/pequena-".$imagem_nome,"size"=>"P"]);
            $imagemModel->files()->create(["url"=>"media/img/products/galeria-".$imagem_nome,"size"=>"G"]);
            $imagemModel->files()->create(["url"=>"media/img/products/slide-".$imagem_nome,"size"=>"S"]);

          }

        }

        return redirect()->route('imagens.index');
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
    public function edit($id)
    {
        if(Gate::denies('imagens-edit')){
          abort(403,"Não autorizado!");
        }

        $registro = Imagem::find($id);

        return view('painel.imagens.edit',compact('registro'));
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
        if(Gate::denies('imagens-edit')){
          abort(403,"Não autorizado!");
        }
       
        $registro = Imagem::find($id);
        $registro->update($request->all());

        if($request->hasFile('imagem')){
          $this->validate($request, [
                'imagem' => 'required|image|dimensions:min_width=600,min_height=600',
          ]);

          $imagem = $request->file('imagem');

          $imagem_nome = time().$imagem->getClientOriginalName();
          $imagem->move("media/img/products/",$imagem_nome);

          $tamPeq = explode("x",config('app.imagemPequena'));
          $tamG = explode("x",config('app.imagemGaleria'));
          $tamS = explode("x",config('app.imagemSlide'));

          $image1 = Image::make("media/img/products/".$imagem_nome)->fit($tamPeq[0],$tamPeq[1])->save("media/img/products/pequena-".$imagem_nome);
          $image2 = Image::make("media/img/products/".$imagem_nome)->fit($tamG[0],$tamG[1])->save("media/img/products/galeria-".$imagem_nome);
          $image3 = Image::make("media/img/products/".$imagem_nome)->fit($tamS[0],$tamS[1])->save("media/img/products/slide-".$imagem_nome);

          $auxNome = explode(".",$imagem->getClientOriginalName());

          $imagPequena = $registro->files()->where('size','=','P')->first();
          $imagGaleria = $registro->files()->where('size','=','G')->first();
          $imagSlide = $registro->files()->where('size','=','S')->first();

          $imagPequena->update(["url"=>"media/img/products/pequena-".$imagem_nome]);
          $imagGaleria->update(["url"=>"media/img/products/galeria-".$imagem_nome]);
          $imagSlide->update(["url"=>"media/img/products/slide-".$imagem_nome]);

        }

        return redirect()->route('imagens.edit',$id);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('imagens-delete')){
            abort(403,"Não autorizado!");
          }
  
          Imagem::find($id)->update(['deleted'=>'S']);
  
          return redirect()->route('imagens.index');
    }

    public function excluidas()
    {
      if(Gate::denies('imagens-edit')){
        abort(403,"Não autorizado!");
      }

      $registros = Imagem::where('deleted','=','S')->orderBy('id','DESC')->paginate(5);
     
      return view('painel.imagens.excluidas',compact('registros'));
    }

    public function recupera($id)
    {
        if(Gate::denies('imagens-edit')){
          abort(403,"Não autorizado!");
        }

        Imagem::find($id)->update(['deleted'=>'N']);

        return redirect()->route('imagens.excluidas');

    }




}
