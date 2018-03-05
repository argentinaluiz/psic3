<?php

namespace App\Models\Painel;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

use App\Models\Painel\Product;

class Order extends Model
{
    protected $fillable = ['total', 'status', 'payment_type'];

    public function orderFields() {
       return $this->belongsToMany(Product::class)->withPivot('qty', 'total', 'payment_type');
    }

    public static function createOrder() {

        // for order inserting to database

        //  echo 'order done';

        $user = Auth::user();
        $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pendente', 'payment_type'=>'Pay Pal']);

        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
        
        }
     }
}
