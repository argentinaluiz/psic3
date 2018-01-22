<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use App\Models\Painel\Role;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        $totalUsers   = User::count();

        \Session::flash('chave','valor');
        $users = \App\User::all();
        //$users = \App\User::paginate(10);
        $paths = [
            ['url'=>'/admin','title'=>'Admin'],
            ['url'=>'','title'=>'Usuários']
        ];
        return view('admin.users.index', compact('users', 'title', 'totalUsers', 'paths'));
    }

    public function role($id)
    {
       $user = User::find($id);
       $role = Role::all();
       $paths = [
            ['url'=>'/admin','title'=>'Admin'],
            ['url'=>route('users.index'),'title'=>'Users'],
            ['url'=>'','title'=>'Role']
        ];
       return view('admin.users.role', compact('user', 'role', 'paths'));
    }

       
    public function roleStore(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $role = Role::find($data['role_id']);
        $user->addRole($role);

        return redirect()->back();
    }

    public function roleDestroy($id, $role_id)
    {
        $user = User::find($id);
        $role = Role::find($role_id);
        $user->deleteRole($role);

        return redirect()->back();
    }

    
    
    public function create(Request $request)
    {
        return view('admin.users.create');
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
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
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
