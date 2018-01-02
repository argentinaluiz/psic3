<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Painel\Permission;
use App\User;

class Role extends Model
{
    
    protected $fillable = [
        'name',
        'label'
    ];

    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}