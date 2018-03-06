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

    
    public function index($stateId)
    {

      // $state = $this->stateModel->find($idState);
      // $cities = $state->cities()->getQuery()->get(['id', 'name']);
      //  return Response::json($cities);
       //$nameState = urldecode($nameState);
       $cities = \DB::table("cities")
                ->where("state_id",$stateId)
                ->pluck('name','id');
        return json_encode($cities);
    }

    
    private function _cityStateIDForStateName($nameState)
    {
        return DB::table('states')->where("name","$nameState")->first()->idState;
    }


}
