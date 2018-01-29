<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forms\UserProfileForm;
use App\User;

class UserProfileController extends Controller
{
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \SON\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
        }

        $form = \FormBuilder::create(UserProfileForm::class, [
            'url' => route('users.profile.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user->profile,
            'data' => ['user' => $user]
        ]);
        return view('admin.users.profile.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \SON\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        if(Gate::denies('users-edit')){
            abort(403,"Não autorizado!");
        }
        
        $form = \FormBuilder::create(UserProfileForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $user->profile->address?$user->profile->update($data):$user->profile()->create($data);


        session()->flash('message', 'Perfil alterado com sucesso.');
        return redirect()->route('users.profile.update', ['user' => $user->id]);
    }
}
