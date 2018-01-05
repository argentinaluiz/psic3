<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Permission;
use App\User;

class Role extends Model
{
    
    protected $fillable = ['name', 'label', 'user_id', 'role_id', 'permission_id'];
    protected $hidden = ['updated_at','created_at','deleted_at'];

    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}