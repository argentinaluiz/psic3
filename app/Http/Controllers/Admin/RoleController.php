<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Role;
use App\Models\Painel\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $totalRoles = Role::count();

      $registros = Role::all();
      $paths = [
      ['url'=>'/admin','title'=>'Admin'],
      ['url'=>'','title'=>'Papéis']
      ];
      return view('admin.role.index',compact('registros','paths', 'totalRoles'));
    }

    public function permission($id)
    {
      $role = Role::find($id);
      $permission = Permission::all();
      $paths = [
          ['url'=>'/admin','title'=>'Admin'],
          ['url'=>route('roles.index'),'title'=>'Papéis'],
          ['url'=>'','title'=>'Permissões'],
      ];
      return view('admin.role.permission',compact('role','permission','paths'));
    }

    public function permissionStore(Request $request,$id)
    {
        $role = Role::find($id);
        $data = $request->all();
        $permission = Permission::find($data['permission_id']);
        $role->addPermission($permission);
        return redirect()->back();
    }

    public function permissionDestroy($id,$permission_id)
    {
      $role = Role::find($id);
      $permission = Permission::find($permission_id);
      $role->deletePermission($permission);
      return redirect()->back();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $paths = [
      ['url'=>'/admin','title'=>'Admin'],
      ['url'=>route('roles.index'),'title'=>'Papéis'],
      ['url'=>'','title'=>'Adicionar']
      ];

      return view('admin.role.create',compact('paths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request['name'] && $request['name'] != "Admin"){
            Role::create($request->all());

          return redirect()->route('roles.index');
      }

      return redirect()->back();
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
      if(Role::find($id)->name == "Admin"){
          return redirect()->route('roles.index');
      }

      $registro = Role::find($id);

      $paths = [
      ['url'=>'/admin','title'=>'Admin'],
      ['url'=>route('roles.index'),'title'=>'Papéis'],
      ['url'=>'','title'=>'Editar']
      ];

      return view('admin.role.edit',compact('registro','paths'));
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
      if(Role::find($id)->name == "Admin"){
          return redirect()->route('roles.index');
      }
      if($request['name'] && $request['name'] != "Admin"){
        Role::find($id)->update($request->all());
      }

      return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Role::find($id)->name == "Admin"){
          return redirect()->route('roles.index');
      }
      Role::find($id)->delete();
      return redirect()->route('roles.index');
    }
}
