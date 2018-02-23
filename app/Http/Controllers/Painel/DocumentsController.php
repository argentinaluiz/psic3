<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Painel\Document;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;
use \Storage;

class DocumentsController extends Controller
{

    public function index()
    {
        if(Gate::denies('documents-view')){
            abort(403,"Não autorizado!");
        }

        //  $totalDocuments = Document::where('deleted','=','N')->count();
          $directory = config('app.fileDestinationPath');
        //  $files = Storage::files($directory);
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
        if($request->hasFile('file')){
            $file = $request->file('file');
            $allowedFileTypes = config('app.allowedFileTypes');
            $maxFileSize = config('app.maxFileSize');
            $rules =['file'=>'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
            ];
            $this->validate($request, $rules);
            $fileName = $file->getClientOriginalName();
            $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

            if($uploaded){
                Document::create([
                    'title' =>$fileName
                ]);
            }
    
        }
        
            
            return redirect()->route('documents.index');

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
