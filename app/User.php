<?php

namespace App;

use App\Notifications\MyResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Painel\Permission;
use App\Models\Painel\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new MyResetPasswordNotification($token));
    }

    public function calls(){
        return $this->belongsToMany(\App\Models\Painel\Call::class);
    }

    public function eAdmin()
    {
      //return $this->id == 1;
      return $this->existRole('Admin');
    }
    
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Painel\Role::class);
    }

    public function addRole($role){
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }

        if($this->existRole($role)){
            return;
        }
        return $this->roles()->attach($role);

    }

    public function existRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }
        return (boolean) $this->roles()->find($role->id);

    }

    public function deleteRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name','=',$role)->firstOrFail();
        }
        return $this->roles()->detach($role);
    }
    
    public function existThisRole($roles)
    {
      $userRoles = $this->roles;
      return $roles->intersect($userRoles)->count();
    }
    
    


}
