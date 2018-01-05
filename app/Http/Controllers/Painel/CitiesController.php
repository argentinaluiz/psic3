<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\City;
use App\Models\Painel\State;

class CitiesController extends Controller
{
    public function index($initials)
    {
        
        $totalCities    = City::count();

        \Session::flash('chave','valor');
        $state = State::where('initials', $initials)->with('cities')->get()->first();
        if(!$state)
            return redirect()->back();
        //dd($state);

        $cities   = $state->cities;
        return view('painel.cities.index', compact('cities', 'title', 'totalCities', 'state'));
    }
}
