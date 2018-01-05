<?php

namespace App\Http\Controllers\Painel;

use App\Models\Painel\Role;
use App\Http\Requests\RoleRequest;
use App\Models\Painel\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class RolesController extends Controller
{
    private $role;
    
    public function __construct(Role $role)
    {
        $this->role = $role;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $totalRoles   = Role::count();

        \Session::flash('chave','valor');
        $roles = $role->get();
        //$roles = Role::paginate(10);
        return view('painel.roles.index', compact('roles', 'title', 'totalRoles'));
    }

    public function permissions($id)
    {
        //Recupera o role
        $role = $this->role->find($id);
        
        //recuperar permissões
        $permissions = $role->permissions()->get();
        
        return view('painel.roles.permission', compact('role', 'permissions'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {    
        Role::create($request->all());
        return view('painel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Role::create($data);
        return redirect()->route('roles.index')
                        ->with('message','Papel cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('painel.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->role->find($id);
        if(!$role)
            return redirect()->back();
        $permissions = $role->permissions()->get();
        return view('painel.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->only(array_keys($request->rules()));
        $role->fill($data);
        $role->save();
        return redirect()->route('roles.index')
            ->with('message','Papel alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('message','Papel excluído com sucesso!');
    }
}
