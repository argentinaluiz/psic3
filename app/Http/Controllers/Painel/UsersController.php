<?php

namespace App\Http\Controllers\Painel;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        $title = "Usuários";
        $totalUsers   = User::count();

        \Session::flash('chave','valor');
        $users = \App\User::all();
        //$users = \App\User::paginate(10);
        return view('painel.users.index', compact('users', 'title', 'totalUsers'));
    }

    
    public function create(Request $request)
    {
        return view('painel.users.create');
    }


    public function store(UserRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        User::create($data);
        //\Session::flash('message','Usuário cadastrado com sucesso');
        return redirect()->route('users.index')
            ->with('message','Usuário cadastrado com sucesso');
    }


    public function show(User $user)
    {
        return view('painel.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('painel.users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $data = $request->only(array_keys($request->rules()));
        $user->fill($data);
        $user->save();
        return redirect()->route('users.index')
            ->with('message','Usuário alterado com sucesso');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('message','Usuário excluído com sucesso');
    }
}
