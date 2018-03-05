<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\CategoryForm;
use App\Models\Painel\Category;
use App\Models\Painel\Research;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('categories-view')){
            abort(403,"Não autorizado!");
        }

        $totalCategories = Category::count();
        $categories = Category::paginate(10);
        return view('painel.categories.index',compact('categories', 'totalCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('categories-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(CategoryForm::class, [
            'url' => route('categories.store'),
            'method' => 'POST'
        ]);
        return view('painel.categories.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('categories-create')){
            abort(403,"Não autorizado!");
        }

        /** @var Form $form */
        $form = \FormBuilder::create(CategoryForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Category::create($data);
        $request->session()->flash('message','Categoria criada com sucesso');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(Gate::denies('categories-view')){
            abort(403,"Não autorizado!");
        }

        return view('painel.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painel\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if(Gate::denies('categories-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(CategoryForm::class, [
            'url' => route('categories.update',['category' => $category->id]),
            'method' => 'PUT',
            'model' => $category
        ]);

        return view('painel.categories.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Painel\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        if(Gate::denies('categories-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(CategoryForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $category->update($data);
        session()->flash('message','Categoria editada com sucesso');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Gate::denies('categories-delete')){
            abort(403,"Não autorizado!");
        }
           
        foreach ($category->researches as $key => $value) {
            $category->researches()->detach($value);
          }

        $category->delete();
        session()->flash('message','Categoria excluída com sucesso');
        return redirect()->route('categories.index');
    }
}
