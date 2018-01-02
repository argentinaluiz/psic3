<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Permission;
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
    }
}
