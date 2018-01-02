<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\State;

class StatesController extends Controller
{
    private $state;


    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function index()
    {
    
        $title          = 'Estados brasileiros';
        $totalStates   = State::count();

        \Session::flash('chave','valor');
        //$states = State::get();
        $states = $this->state->get();
        return view('painel.states.index', compact('states', 'title', 'totalStates'));
    }
}
