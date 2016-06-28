<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\OrderItem;
use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{


    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0)
        {
            $order = $orderModel->create(['user_id' => Auth::user()->id,'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k => $item)
            {
                $order->items()->create(['product_id' => $k,'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            dd($order);
        }

        return redirect()->route('cart');
    }

}
