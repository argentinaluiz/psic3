<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
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
      if(Gate::denies('role-view')){
        abort(403,"Não autorizado!");
      }

      $totalRoles = Role::count();
      $registros = Role::all();
      
      return view('admin.role.index',compact('registros','totalRoles'));
    }

    public function permission($id)
    {
      if(Gate::denies('role-edit')){
        abort(403,"Não autorizado!");
      }
      
      $role = Role::find($id);
      $permission = Permission::all();

      return view('admin.role.permission',compact('role','permission'));
    }

    public function permissionStore(Request $request,$id)
    {
      if(Gate::denies('role-edit')){
        abort(403,"Não autorizado!");
      }
            
      $role = Role::find($id);
      $data = $request->all();
      $permission = Permission::find($data['permission_id']);
      $role->addPermission($permission);
      return redirect()->back();
    }

    public function permissionDestroy($id,$permission_id)
    {
      if(Gate::denies('role-edit')){
        abort(403,"Não autorizado!");
      }
             
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
    public function create(Request $request)
    {
      if(Gate::denies('role-create')){
        abort(403,"Não autorizado!");
      }

      return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Gate::denies('role-create')){
        abort(403,"Não autorizado!");
      }
            
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
      if(Gate::denies('role-edit')){
        abort(403,"Não autorizado!");
      }
         
      if(Role::find($id)->name == "Admin"){
          return redirect()->route('roles.index');
      }
      $registro = Role::find($id);
      return view('admin.role.edit',compact('registro', 'permission'));
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
      if(Gate::denies('role-edit')){
        abort(403,"Não autorizado!");
      }

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
      if(Gate::denies('role-delete')){
        abort(403,"Não autorizado!");
      }

      if(Role::find($id)->name == "Admin"){
          return redirect()->route('roles.index');
      }
      Role::find($id)->delete();
      return redirect()->route('roles.index');
    }
}
