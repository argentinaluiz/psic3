<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Models\Painel\Product');
    }
}
