<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class DiscountCoupon extends Model
{
    protected $fillable = [
        'name',
        'tracker',
        'discount',
        'discount_mode',
        'limit',
        'limit_mode',
        'expiry_dthr',
        'ativo'
    ];
}
