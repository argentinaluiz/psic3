<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Agenda;
use App\Models\Painel\AgendaRequest;
use App\Models\Painel\Client;
use App\Models\Painel\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $totalAgendas  = Agenda::count();

        \Session::flash('chave','valor');
        //$Agendas = Agenda::paginate(10);
        $agendas = Agenda::all();
        return view('painel.agendas.index', compact('agendas', 'title', 'totalAgendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       //chamar as clínicas (clients: expertise (4))
       //chamar os psicanalistas (clients: expertise (2))

       $rooms = Room::pluck('id', 'id');

        return view('painel.agendas.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('painel.agendas.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('painel.agendas.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $role->delete();
        return redirect()->route('agendas.index')
            ->with('message','Agendamento excluído com sucesso!');
    }
}
