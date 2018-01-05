<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];

    public function order_products()
    {
        return $this->hasMany('App\Models\Painel\OrderProduct')
            //Especifico os campos que desejo trazer, porque não desejo usar todos da tabela
            ->select( \DB::raw('product_id, sum(discount) as discounts, sum(value) as values, count(1) as qtd') )
            ->groupBy('product_id')
            ->orderBy('product_id', 'desc');
    }

    public function order_products_itens()
    {
        return $this->hasMany('App\Models\Painel\OrderProduct');
    }

    public static function consultaId($where)
    {
        $order = self::where($where)->first(['id']);
        return !empty($order->id) ? $order->id : null;
    }



}
