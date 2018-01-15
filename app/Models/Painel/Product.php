<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image_url',
        'description',
        'old_price',
        'price',
        'active'
    ];
  
}
