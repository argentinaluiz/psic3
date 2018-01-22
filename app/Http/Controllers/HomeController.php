<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painel\Call;
use Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
       // $calls = Call::where('user_id','=',$user->id)->get();
        $calls = Call::all();
        return view('home', compact('calls'));
    }

    public function detail($id)
    {
        $call = Call::find($id);
        //$this->authorize('view-call', $call);

        /*
        if(Gate::denies('view-call', $call)){
            abort(403, "Não autorizado!" );
        }
        
        if(Gate::allows('view-call', $call)){
            return view('detail', compact('call'));
        }
        abort(403, "Não autorizado!" );
        */

        return view('detail', compact('call'));
    }
}
