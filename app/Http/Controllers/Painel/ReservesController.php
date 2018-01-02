<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Reserve;
use App\Http\Requests\ReserveRequest;
use App\Models\Painel\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title              = "Reservas";
        $totalReserves   = Reserve::count();

        \Session::flash('chave','valor');
        $reserves = Reserve::all();
        //$rooms = Room::paginate(10);
        return view('painel.reserves.index', compact('reserves', 'title', 'totalReserves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('painel.reserves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReserveRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Reserve::create($data);
        return redirect()->route('reserves.index')
                        ->with('message','Reserva cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show(Reserve $reserve)
    {
        return view('painel.reserves.show', compact('reserve'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserve $reserve)
    {
        return view('painel.reserves.edit', compact('reserve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(ReserveRequest $request, Reserve $reserve)
    {
        $data = $request->only(array_keys($request->reserves()));
        $reserve->fill($data);
        $reserve->save();
        return redirect()->route('reserves.index')
            ->with('message','Reserva alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
        return redirect()->route('reserves.index')
            ->with('message','Reserva excluída com sucesso');
    }

}
