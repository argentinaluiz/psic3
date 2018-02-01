<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\City;
use App\Models\Painel\State;

class CitiesController extends Controller
{
    
    private $stateModel;
    
    public function __construct(State $state)
    {
        $this->stateModel = $state;
    }

    
    public function index($sigla)
    {
        
        $totalCities    = City::count();
        
        $state = State::where('sigla', $sigla)->with('cities')->get()->first();
        if(!$state)
            return redirect()->back();
        //dd($state);

        $cities   = $state->cities;
        return view('painel.cities.index', compact('cities', 'totalCities', 'state'));
    }

    public function getCities($idState)
    {
        $state = $this->stateModel->find($idState);
        $cities = $state->cities()->getQuery()->get(['id', 'city']);
        return Response::json($cities);
    }
}
