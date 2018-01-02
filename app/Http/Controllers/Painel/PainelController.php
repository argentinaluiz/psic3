<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Painel\Role;
use App\Models\Painel\Permission;
use App\Models\Painel\Client;
use App\Models\Painel\Room;
use App\Models\Painel\State;
use App\Models\Painel\City;
use App\Models\Painel\Agenda;
use App\Models\Painel\Reserve;





class PainelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Relatório de Reservas";
        // $totalClinics       = App\Models\Painel\Client::where(['expertise' => 4])->count();
        $totalRooms         = Room::count();
        $totalStates        = State::count();
        $totalCities        = City::count();
       // $totalPsychoanalyst = App\Models\Painel\Client::where(['expertise' => 2])->count();
        $totalAgendas       = Agenda::count();
       // $totalPacients       = App\Models\Painel\Client::where(['expertise' => 1])->count();
        $totalReserves      = Reserve::count();

        return view('painel.home.index', compact(
           // 'totalClinics',
            'totalRooms',
            'totalStates',
            'totalCities',
            //'totalPsychoanalyst',
            'totalAgendas',
           // 'totalPacients',
            'totalReserves', 'title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
