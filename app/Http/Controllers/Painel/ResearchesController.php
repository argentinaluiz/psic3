<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\ResearchForm;

use App\Models\Painel\Research;
use App\Models\Painel\Category;

class ResearchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
          $categories = Category::all();
    
          return view('painel.researches.create',compact('form', 'categories'));
    }

    public function store(Request $request)
    {
        if(Gate::denies('researches-create')){
            abort(403,"Não autorizado!");
        }
        /** @var Form $form */
        $form = \FormBuilder::create(ResearchForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                    ->withInput();
        }

        $data = $request->all();
        $research = Research::create($request->all());
        if(isset($data['novasCategorias'])){
            foreach ($data['novasCategorias'] as $key => $value) {
            $research->categories()->save(Category::find($value));
            }
        }

        $request->session()->flash('message','Pesquisa criada com sucesso');
  
        return redirect()->route('researches.index');

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

          $categories = Category::all();

          return view('painel.researches.edit',compact('form', 'categories', 'research'));

    }

    public function update(Request $request, Research $research)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(ResearchForm::class, [
            'data' => ['id' => $research->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                    ->withInput();
        }

        $data = $request->all();
        $research = Research::create($request->all());
        if(isset($data['novasCategorias'])){
            foreach ($data['novasCategorias'] as $key => $value) {
            $research->categories()->save(Category::find($value));
            }
        }

        return redirect()->route('researches.index')
            ->with('message','Pesquisa alterada com sucesso!');
    }

    public function destroy(Research $research)
    {
        if(Gate::denies('researches-delete')){
            abort(403,"Não autorizado!");
          }
    
          foreach ($research->categories as $key => $value) {
            $research->categories()->detach($value);
          }
    
          foreach ($research->imagens as $key => $value) {
            $value->delete();
          }
    
          $research->delete();
          return redirect()->route('researches.index');
    }

}
