<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Permission;
use App\Models\Painel\Role;
use App\User;

class Permission extends Model
{
    
    protected $fillable = [
        'name',
        'label'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
        //return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id' );
    }


    
}
