<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('message', 'O Item foi removido!');
    }

    /**
     * Switch item from Saved for Later  to Cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('message', 'O Item já está no seu Carrinho!');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Painel\Product');

        return redirect()->route('cart.index')->with('message', 'O Item foi movido para o seu Carrinho!');
    }
}
