<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Painel\Document;
use Illuminate\Support\Facades\Gate;
use Storage;

class DocumentsController extends Controller
{

    public function index()
    {
        if(Gate::denies('documents-view')){
            abort(403,"Não autorizado!");
        }

          $registros = Document::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);

          return view('painel.documents.index',compact('registros'));
    }


    public function create(Request $request)
    {
        if(Gate::denies('documents-create')){
            
            abort(403,"Não autorizado!");
          }
  
          return view('painel.documents.create') ;
    }

    public function store(Request $request)
    {
        if(Gate::denies('documents-create')){
            abort(403,"Não autorizado!");
        }       
            $files = $request->file('files');

            if(!empty($files)):
                foreach($files as $file):
                    Storage::put($file->getClientOriginalName(), file_get_contents($file));
                endforeach;
            endif;
            return redirect()->route('documents.index')
                    ->with('message', 'Documento(s) criado(s) com sucesso!');

    }


    public function edit($id)
    {
        if(Gate::denies('documents-edit')){
          abort(403,"Não autorizado!");
        }

        $registro = Document::find($id);

        return view('painel.documents.edit',compact('registro'));
    }


    public function update(Request $request, Document $document)
    {
        //
    }

  
    public function destroy($id)
    {
        if(Gate::denies('documents-delete')){
            abort(403,"Não autorizado!");
          }
  
        Document::find($id)->update(['deleted'=>'S']);

        return redirect()->route('documents.index');
    }

    public function excluidas()
    {
      if(Gate::denies('documents-edit')){
        abort(403,"Não autorizado!");
      }

      $registros = Document::where('deleted','=','S')->orderBy('id','DESC')->paginate(5);
     
      return view('painel.documents.excluidas',compact('registros'));
    }

    public function recupera($id)
    {
        if(Gate::denies('documents-edit')){
          abort(403,"Não autorizado!");
        }

        Document::find($id)->update(['deleted'=>'N']);

        return redirect()->route('documents.excluidas');

    }
}
