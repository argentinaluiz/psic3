<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Painel\Order;
use App\Models\Painel\Product;
use App\Models\Painel\OrderProduct;
use App\Models\Painel\DiscountCoupon;

class CartController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    ublic function index()
    {

        $orders = Order::where([
            'status'  => 'RE',
            'user_id' => Auth::id()
            ])->get();
        
        dd([
            $orders,
            $orders[0]->order_products,
            $orders[0]->order_products[0]->product,
        ]);

        return view('site.cart.index', compact('orders'));
    }

    public function adicionar()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idproduct = $req->input('id');

        $product = Product::find($idproduct);
        if( empty($product->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->route('site.cart.index');
        }

        $iduser = Auth::id();

        $idorder = Order::consultaId([
            'user_id' => $iduser,
            'status'  => 'RE' // Reservada
            ]);

        if( empty($idorder) ) {
            $order_new = Order::create([
                'user_id' => $iduser,
                'status'  => 'RE'
                ]);

            $idorder = $order_new->id;

        }

        OrderProduct::create([
            'order_id'  => $idorder,
            'product_id' => $idproduct,
            'value'      => $product->value,
            'status'     => 'RE'
            ]);

        $req->session()->flash('mensagem-sucesso', 'Produto adicionado ao carrinho com sucesso!');

        return redirect()->route('site.cart.index');

    }

    public function remover()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder           = $req->input('order_id');
        $idproduct          = $req->input('product_id');
        $remove_apenas_item = (boolean)$req->input('item');
        $iduser          = Auth::id();

        $idorder = Order::consultaId([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'RE' // Reservada
            ]);

        if( empty($idorder) ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('site.cart.index');
        }

        $where_produto = [
            'order_id'  => $idorder,
            'product_id' => $idproduct
        ];

        $product = OrderProduct::where($where_produto)->orderBy('id', 'desc')->first();
        if( empty($product->id) ) {
            $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
            return redirect()->route('site.cart.index');
        }

        if( $remove_apenas_item ) {
            $where_produto['id'] = $product->id;
        }
        OrderProduct::where($where_produto)->delete();

        $check_order = OrderProduct::where([
            'order_id' => $product->order_id
            ])->exists();

        if( !$check_order ) {
            Order::where([
                'id' => $product->order_id
                ])->delete();
        }

        $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');

        return redirect()->route('site.cart.index');
    }

    public function concluir()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder  = $req->input('order_id');
        $iduser = Auth::id();

        $check_order = Order::where([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'RE' // Reservada
            ])->exists();

        if( !$check_order ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
            return redirect()->route('site.cart.index');
        }

        $check_products = OrderProduct::where([
            'order_id' => $idorder
            ])->exists();
        if(!$check_products) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('site.cart.index');
        }

        OrderProduct::where([
            'order_id' => $idorder
            ])->update([
                'status' => 'PA'
            ]);
            Order::where([
                'id' => $idorder
            ])->update([
                'status' => 'PA'
            ]);

        $req->session()->flash('mensagem-sucesso', 'Compra concluída com sucesso!');

        return redirect()->route('site.cart.compras');
    }

    public function compras()
    {

        $compras = Order::where([
            'status'  => 'PA',
            'user_id' => Auth::id()
            ])->orderBy('created_at', 'desc')->get();

        $cancelados = Order::where([
            'status'  => 'CA',
            'user_id' => Auth::id()
            ])->orderBy('updated_at', 'desc')->get();

        return view('site.cart.compras', compact('compras', 'cancelados'));

    }

    public function cancelar()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder       = $req->input('order_id');
        $idsorder_prod = $req->input('id');
        $iduser      = Auth::id();

        if( empty($idspedido_prod) ) {
            $req->session()->flash('mensagem-falha', 'Nenhum item selecionado para cancelamento!');
            return redirect()->route('site.cart.compras');
        }

        $check_order = Order::where([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'PA' // Pago
            ])->exists();

        if( !$check_order ) {
            $req->session()->flash('mensagem-falha', 'Order não encontrado para cancelamento!');
            return redirect()->route('site.cart.compras');
        }

        $check_products = OrderProduct::where([
                'order_id' => $idorder,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->exists();

        if( !$check_products ) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('site.cart.compras');
        }

        OrderProduct::where([
                'order_id' => $idorder,
                'status'    => 'PA'
            ])->whereIn('id', $idspedido_prod)->update([
                'status' => 'CA'
            ]);

        $check_order_cancel = OrderProduct::where([
                'order_id' => $idorder,
                'status'    => 'PA'
            ])->exists();

        if( !$check_order_cancel ) {
            Order::where([
                'id' => $idorder
            ])->update([
                'status' => 'CA'
            ]);

            $req->session()->flash('mensagem-sucesso', 'Compra cancelada com sucesso!');

        } else {
            $req->session()->flash('mensagem-sucesso', 'Item(ns) da compra cancelado(s) com sucesso!');
        }

        return redirect()->route('site.cart.compras');
    }

    public function discount()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idorder  = $req->input('order_id');
        $coupom     = $req->input('cupom');
        $iduser = Auth::id();

        if( empty($coupom) ) {
            $req->session()->flash('mensagem-falha', 'Cupom inválido!');
            return redirect()->route('site.cart.index');
        }

        $coupom = DiscountCoupom::where([
            'tracker' => $coupom,
            'ativo'       => 'S'
            ])->where('expiry_dthr', '>', date('Y-m-d H:i:s'))->first();

        if( empty($coupom->id) ) {
            $req->session()->flash('mensagem-falha', 'Cupom de desconto não encontrado!');
            return redirect()->route('site.cart.index');
        }

        $check_order = Order::where([
            'id'      => $idorder,
            'user_id' => $iduser,
            'status'  => 'RE' // Reservado
            ])->exists();

        if( !$check_order ) {
            $req->session()->flash('mensagem-falha', 'Pedido não encontrado para validação!');
            return redirect()->route('site.cart.index');
        }

        $order_products = OrderProduct::where([
                'order_id' => $idorder,
                'status'    => 'RE'
            ])->get();

        if( empty($order_products) ) {
            $req->session()->flash('mensagem-falha', 'Produtos do pedido não encontrados!');
            return redirect()->route('site.cart.index');
        }

        $apply_discount = false;
        foreach ($order_products as $order_product) {

            switch ($coupom->discount_mode) {
                case 'porc':
                    $value_discount = ( $order_product->value * $coupom->discount ) / 100;
                    break;

                default:
                    $value_discount = $coupom->discount;
                    break;
            }

            $value_discount = ($value_discount > $order_product->value) ? $order_product->value : number_format($value_discount, 2);

            switch ($coupom->limit_mode) {
                case 'qtd':
                    $qtd_pedido = OrderProduct::whereIn('status', ['PA', 'RE'])->where([
                            'discount_coupom_id' => $coupom->id
                        ])->count();

                    if( $qtd_pedido >= $coupom->limit ) {
                        continue;
                    }
                    break;

                default:
                    $value_ckc_discounts = OrderProduct::whereIn('status', ['PA', 'RE'])->where([
                            'discount_coupom_id' => $coupom->id
                        ])->sum('discount');

                    if( ($value_ckc_discounts+$value_discount) > $coupom->limit ) {
                        continue;
                    }
                    break;
            }

            $order_product->discount_coupom_id = $coupom->id;
            $order_product->discount          = $value_discount;
            $order_product->update();

            $apply_discount = true;

        }

        if( $apply_discount ) {
            $req->session()->flash('mensagem-sucesso', 'Cupom aplicado com sucesso!');
        } else {
            $req->session()->flash('mensagem-falha', 'Cupom esgotado!');
        }
        return redirect()->route('site.cart.index');

    }
}
