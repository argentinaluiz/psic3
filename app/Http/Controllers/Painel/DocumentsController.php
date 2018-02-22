<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Painel\Document;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('documents-view')){
            abort(403,"Não autorizado!");
        }

          $totalDocuments = Document::where('deleted','=','N')->count();
          $registros = Document::where('deleted','=','N')->orderBy('id','DESC')->paginate(10);

          return view('painel.documents.index',compact('registros', 'totalDocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Gate::denies('documents-create')){
            abort(403,"Não autorizado!");
          }
  
          return view('painel.documents.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Gate::denies('documents-create')){
            abort(403,"Não autorizado!");
        }

        if($request->hasFile('documents')){
            $documents = $request->documents;
            $documentRegras = array(
                'document' => 'required|document|mimes:png,gif,jpeg,mp3,mp4,doc,docx,pdf,xls',
            );
    
            foreach($documents as $document){
                $documentArray = array('document' => $document);
                $documentValidator = Validator::make($documentArray, $documentRegras);
                if ($documentValidator->fails()) {
                return redirect()->route('documents.create')
                            ->withErrors($documentValidator)
                            ->withInput();
                }
            }

            foreach ($documents as $document) {
                $destinationPath = 'media/documents';
                $document_nome = time().$document->getClientOriginalExtension();
                if($extension == "jpg" || $extension == "PNG" || $extension == "gif")
                {
                $destinationPath = 'media/documents/img';

                }
                else if ($extension == "docx" || $extension == "doc")
                {
                $destinationPath = 'media/documents/doc';
                }
                else if ($extension == "pdf")
                {
                $destinationPath = 'media/documents/pdf';
                }
                else if ($extension == "xls")
                {
                $destinationPath = 'media/documents/xls';
                }
                $document->move($destinationPath,$document_nome);

                $auxNome = explode(".",$document->getClientOriginalExtension());
                $documentModel = Document::create(["title"=>$auxNome[0],"description"=>""]);
                $documentModel->files()->create(["url"=>$destinationPath.$document_nome,"type"=>$extension]);
              }
    
            }
    
            return redirect()->route('documents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Painel\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Painel\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Painel\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Painel\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
