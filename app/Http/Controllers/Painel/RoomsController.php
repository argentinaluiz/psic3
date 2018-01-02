<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Room;
use App\Http\Requests\RoomRequest;
use App\Models\Painel\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title              = "Salas";
        $totalRooms   = Room::count();

        \Session::flash('chave','valor');
        $rooms = Room::all();
        //$rooms = Room::paginate(10);
        return view('painel.rooms.index', compact('rooms', 'title', 'totalRooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('painel.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Room::create($data);
        return redirect()->route('rooms.index')
                        ->with('message','Sala cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('painel.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('painel.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
        $data = $request->only(array_keys($request->rules()));
        $room->fill($data);
        $room->save();
        return redirect()->route('rooms.index')
            ->with('message','Sala alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')
            ->with('message','Sala excluída com sucesso');
    }
}
