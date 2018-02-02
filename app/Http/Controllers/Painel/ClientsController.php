<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Support\Facades\Gate;
use App\Models\Painel\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller //Controller resource
{
    protected $totalPage = 10;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('clients-view')){
            abort(403,"Não autorizado!");
        }

        $totalClients   = Client::count();

        $countPatients = Client::where(['expertise' => 1])->count(); 
        $countPsychoanalysts = Client::where(['expertise' => 2])->count();
        $countSupervisor = Client::where(['expertise' => 3])->count();
        $countClinics = Client::where(['expertise' => 4])->count(); 

        \Session::flash('chave','valor');
        $clients = Client::all();
        $patients = Client::where(['expertise' => 1])->get();
        $psychoanalysts = Client::where(['expertise' => 2])->get();
        $supervisors = Client::where(['expertise' => 3])->get();
        $clinics= Client::where(['expertise' => 4])->get();
        //$clients = Client::paginate(10);
        return view('painel.clients.index', compact(
            'clients', 
            'title', 
            'totalClients', 
            'countPatients', 
            'countPsychoanalysts', 
            'countSupervisor' ,
            'countClinics',
            'patients',
            'psychoanalysts',
            'supervisors',
            'clinics')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $clientType = Client::getClientType($request->client_type);
        return view('painel.clients.create', ['client' => new Client(), 'clientType' => $clientType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['defaulter'] = $request->has('defaulter');
        $data['client_type'] = Client::getClientType($request->client_type);
        Client::create($data);
        //\Session::flash('message','Cliente cadastrado com sucesso');
        return redirect()->route('clients.index')
            ->with('message','Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        if(Gate::denies('clients-view')){
            abort(403,"Não autorizado!");
        }

        return view('painel.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) //Route Model Binding Implicito
    {
        if(Gate::denies('clients-edit')){
            abort(403,"Não autorizado!");
        }

        $clientType = $client->client_type;
        return view('painel.clients.edit', compact('client', 'clientType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        if(Gate::denies('clients-edit')){
            abort(403,"Não autorizado!");
        }

        $data = $request->only(array_keys($request->rules()));
        $data['defaulter'] = $request->has('defaulter');
        $client->fill($data);
        $client->save();
        //\Session::flash('message','Cliente alterado com sucesso');
        return redirect()->route('clients.index')
            ->with('message','Cliente alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if(Gate::denies('clients-delete')){
            abort(403,"Não autorizado!");
        }

        $client->delete();
        return redirect()->route('clients.index')
            ->with('message','Cliente excluído com sucesso!');
    }

}
