<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

use App\Models\Painel\UserProfile;
use App\Forms\UserProfileForm;
use App\Models\Painel\Product;
use App\Models\Painel\Order;

class CheckoutController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            return view('checkout')->with([
                'discount' => $this->getNumbers()->get('discount'),
                'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
                'newTax' => $this->getNumbers()->get('newTax'),
                'newTotal' => $this->getNumbers()->get('newTotal'),
            ]);
        }
        else {
            return redirect('login');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        $userid = Auth::user()->id;
            $UserProfile = new UserProfile;
            $UserProfile->address = $request->address;
            $UserProfile->number = $request->number;
            $UserProfile->complement = $request->complement;
            $UserProfile->city_id = $request->city_id;
            $UserProfile->cep = $request->cep;
            $UserProfile->neighborhood = $request->neighborhood;
            $UserProfile->user_id = $userid;
            $UserProfile->save();
           // dd('done');
            order::createOrder();

            // SUCCESSFUL
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('message', 'Obrigado! Seu pagamento foi aceito com sucesso!');
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }
}
