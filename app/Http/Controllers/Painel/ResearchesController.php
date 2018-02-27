<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\ResearchRequest;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\ResearchForm;

use App\Models\Painel\Research;
use App\Models\Painel\Category;
use App\Models\Painel\Document;
use App\Models\Painel\Arcade;

class ResearchesController extends Controller
{
    private $research;
    public function __construct(Research $research)
    {
        $this->research = $research;
    }

    public function index()
    {
        if(Gate::denies('researches-view')){
            abort(403,"Não autorizado!");
          }
          
          $totalResearches   = Research::count();
          $researches = Research::orderBy("id","DESC")->paginate(10);
         
          return view('painel.researches.index',compact('researches', 'totalResearches'));
    }

    public function category($id)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
          }
      
       $research = Research::find($id);
       $category = Category::all();

       $form = \FormBuilder::create(ResearchForm::class, [
        'url' => route('researches.update',['research' => $research->id]),
        'method' => 'PUT',
        'model' => $research
      ]);

       return view('painel.researches.category', compact('research', 'category', 'form'));
    }

    public function categoryStore(Request $request, $id)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
          }

        $research = Research::find($id);
        $data = $request->all();
        $category = Category::find($data['category_id']);
        $research->addCategory($category);

        return redirect()->back();
    }

    public function categoryDestroy($id, $category_id)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
          }
        
        $research = Research::find($id);
        $category = Category::find($category_id);
        $research->deleteCategory($category);

        return redirect()->back();
    }

    public function create()
    {
        if(Gate::denies('researches-create')){
            abort(403,"Não autorizado!");
          }
    
          $form = \FormBuilder::create(ResearchForm::class, [
            'url' => route('researches.store'),
            'method' => 'POST'
          ]);
    
          return view('painel.researches.create',compact('form'));
    }

    public function store(ResearchRequest $request)
    {
        if(Gate::denies('researches-create')){
            abort(403,"Não autorizado!");
        }
        $nameFile = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) { 
            $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('research', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }

        if ( $this->research->newResearch($request, $nameFile) ) 
        return redirect()
                            ->route('researches.index')
                            ->with('message', 'Pesquisa criada com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao cadastrar')
                            ->withInput();

    }

    public function show(Research $research)
    {
        if(Gate::denies('researches-view')){
            abort(403,"Não autorizado!");
        }

        return view('painel.researches.show', compact('research'));
    }

    public function edit(Research $research)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
          }

        $form = \FormBuilder::create(ResearchForm::class, [
            'url' => route('researches.update',['research' => $research->id]),
            'method' => 'PUT',
            'model' => $research
        ]);

          return view('painel.researches.edit',compact('form', 'research'));

    }

    public function update(ResearchRequest $request, $id)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
        }

        $research = $this->research->find($id);
        if(!$research) return redirect()->back();

        $nameFile = $research->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            if($research->image)
                $nameFile = $research->image;
            else
                $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('research', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

        }
        

        if ( $research->updateResearch($request, $nameFile) )
            return redirect()
                            ->route('researches.index')
                            ->with('message', 'Pesquisa alterada com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao atualizar')
                            ->withInput();
    }

    public function destroy(Research $research)
    {
        if(Gate::denies('researches-delete')){
            abort(403,"Não autorizado!");
          }
    
          foreach ($research->categories as $key => $value) {
            $research->categories()->detach($value);
          }
    
        /*  foreach ($research->imagens as $key => $value) {
            $value->delete();
          }
        */
    
          $research->delete();
          return redirect()->route('researches.index');
    }

    public function indexArcade(Research $research)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }

      $form = \FormBuilder::create(ResearchForm::class, [
        'url' => route('researches.update',['research' => $research->id]),
        'method' => 'PUT',
        'model' => $research
      ]);
      
      $registros = $research->documents()->where('deleted','=','N')->orderBy('order')->paginate(10);

      return view('painel.researches.arcade',compact('registros','research', 'form'));
    }

    public function createArcade(Research $research)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }

      if($research->documents()->where('deleted','=','N')->count()){
        $documentsResearch = $research->documents()->where('deleted','=','N')->get();
      }else{
        $documentsResearch = null;
      }

      $documents = Document::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);

      return view('painel.researches.documents',compact('documents','research','documentsResearch'));
    }

    public function storeArcade(Request $request)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }

      $data = $request->all();

      $research = Research::find($data['research']);
      $document = Document::find($data['id']);

      $order= 1;
      if($research->documents()->where('deleted','=','N')->count()){
        $aux = $research->documents()->where('deleted','=','N')->orderBy('order','DESC')->first();
        $order = $aux->order + 1;
      }

      if($research->documents()->where('document_id','=',$document->id)->count()){
        $aux = $research->documents()->where('document_id','=',$document->id)->first();
        $aux->update(['deleted'=>'N','order'=>$order]);
      }else{
        $research->documents()->create(['document_id'=>$document->id ,'url'=>$document->arcadeUrl(), 'order'=> $order]);
      }

      return $research->documents;
    }

    public function removeArcade(Request $request)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }
      $data = $request->all();

      $research = Research::find($data['research']);
      $document = Document::find($data['id']);

      if($research->documents()->where('document_id','=',$document->id)->count() > 1){
        $arcades = $research->documents()->where('document_id','=',$document->id)->get();
        foreach ($arcades as $arcade) {
          $arcade->update(['deleted'=>'S']);
        }
      }else{
        $arcade = $research->documents()->where('document_id','=',$document->id)->first();
        $arcade->update(['deleted'=>'S']);
      }

      return $research->documents;
    }

    public function editArcade(Arcade $arcade)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }

      $registro = $arcade;
      $research = $arcade->research;

      return view('painel.researches.arcade.edit',compact('registro'));
    }

    public function updateArcade(Request $request, Arcade $arcade)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }

        $this->validate($request, [
          'order' => 'required|numeric',
         ]);

          $data = $request->all();
          $registro = $arcade;
          $research = $arcade->research;

          $registro->update($request->all());
          session()->flash('message','Galeria editada com sucesso');
          return redirect()->route('researches.arcade', $research);

      }

    public function deleteArcade(Request $request,Arcade $arcade)
    {
      if(Gate::denies('researches-edit')){
        abort(403,"Não autorizado!");
      }

      $arcade->update(['deleted'=>'S']); 
      session()->flash('message','Galeria excluída com sucesso');
      return redirect()->back();
    }






}
