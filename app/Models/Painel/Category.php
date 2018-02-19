<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function products()
    {
      return $this->belongsToMany(App\Models\Painel\Product::class);
    }

    public function researches()
    {
      return $this->belongsToMany(App\Models\Painel\Research::class);
    }
}
