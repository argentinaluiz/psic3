<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;
use App\Forms\UserForm;
use App\User;
use App\Models\Painel\Role;


class UserController extends Controller
{

    public function index()
    {
        if(Gate::denies('users-view')){
            abort(403,"Não autorizado!");
        }
        
        $totalUsers   = User::count();
        $users = \App\User::paginate(10); //Caso não use o método paginate, mas all... na view fica apenas Table::withContents($users()), sem o ->items
        
        return view('admin.users.index', compact('users', 'totalUsers'));
    }

    public function role($id)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
          }
    
       $user = User::find($id);
       $role = Role::all();

       return view('admin.users.role', compact('user', 'role'));
    }

       
    public function roleStore(Request $request, $id)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
          }

        $user = User::find($id);
        $data = $request->all();
        $role = Role::find($data['role_id']);
        $user->addRole($role);

        return redirect()->back();
    }

    public function roleDestroy($id, $role_id)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
          }
        
        $user = User::find($id);
        $role = Role::find($role_id);
        $user->deleteRole($role);

        return redirect()->back();
    }

    
    public function create()
    {   
        if(Gate::denies('users-create')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('users.store'),
            'method' => 'POST'
        ]);

        return view('admin.users.create', compact('form'));
    }


    public function store(Request $request)
    {
        if(Gate::denies('users-create')){
            abort(403,"Não autorizado!");
        }

          /** @var Form $form */
        $form = \FormBuilder::create(UserForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                    ->withInput();
        }

        $data = $form->getFieldValues();
        $result = User::createFully($data);
        $request->session()->flash('message','Usuário criado com sucesso');
        $request->session()->flash('user_created',[
            'id' => $result['user']->id,
            'password' => $result['password']
        ]);
        return redirect()->route('users.show_details');
    }

    public function showDetails(){
        if(Gate::denies('users-create')){
            abort(403,"Não autorizado!");
        }

        $userData = session('user_created');
        $user = User::findOrFail($userData['id']);
        $user->password = $userData['password'];
        return view('admin.users.show_details',compact('user'));
    }


    public function show(User $user)
    {
        if(Gate::denies('users-view')){
            abort(403,"Não autorizado!");
        }
        
        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
          }

        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('users.update',['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user
        ]);

        return view('admin.users.edit', compact('form'));
    }


    public function update(User $user)
    {  
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
          }
        
          /** @var Form $form */
          $form = \FormBuilder::create(UserForm::class, [
            'data' => ['id' => $user->id]
        ]);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $user->update($data);
        session()->flash('message','Usuário editado com sucesso');
        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        if(Gate::denies('users-delete')){
            abort(403,"Não autorizado!");
        }
        
        $user->delete();
        session()->flash('message','Usuário excluído com sucesso');
        return redirect()->route('users.index');
    }

}
