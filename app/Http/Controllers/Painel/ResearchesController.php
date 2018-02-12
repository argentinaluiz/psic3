<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Search;
use App\Models\Painel\Imagem;
use App\Models\Painel\Category;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
          
          $totalResearches   = Search::count();
          $registros = Search::orderBy("id","DESC")->paginate(10);
         
          return view('painel.researches.index',compact('registros', 'totalResearches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('researches-create')){
            abort(403,"Não autorizado!");
          }
    
          $categories = Category::all();
    
          return view('painel.researches.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SearchRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['active'] = $request->has('active');

        Search::create($data);
        if(isset($data['novasCategorias'])){
          foreach ($data['novasCategorias'] as $key => $value) {
            $search->categories()->save(Category::find($value));
          }
        }
  
        return redirect()->route('researches.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
          }

          $registro = $search;

          $categories = Category::all(); 

          return view('painel.researches.edit',compact('registro','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(SearchRequest $request, Search $search)
    {
        if(Gate::denies('researches-edit')){
            abort(403,"Não autorizado!");
        }

        $data = $request->only(array_keys($request->rules()));
        $registro = $search;

        $registro->update($request->all());
        foreach ($registro->categories as $key => $value) {
            $registro->categories()->detach($value);
        }
        if(isset($dados['novasCategorias'])){
            foreach ($dados['novasCategorias'] as $key => $value) {
            $registro->categories()->save(Category::find($value));
            }
        }

        return redirect()->route('researches.index')
            ->with('message','Pesquisa alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        if(Gate::denies('researches-delete')){
            abort(403,"Não autorizado!");
          }
    
          foreach ($search->categories as $key => $value) {
            $search->categories()->detach($value);
          }
    
          foreach ($search->imagens as $key => $value) {
            $value->delete();
          }
    
          $search->delete();
          return redirect()->route('researches.index');
    }

}
