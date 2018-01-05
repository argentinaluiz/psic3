<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'status',
        'value'
    ];
    
    public function product()
    {
        return $this->belongsTo('App\Models\Painel\Product', 'product_id', 'id');
    }
}
