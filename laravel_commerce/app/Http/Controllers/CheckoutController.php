<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\OrderItem;
use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{


    /**
     * CheckoutController constructor.
     */

    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {
        if (!Session::has('cart'))
        {
            return false;
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0)
        {
            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create(['user_id' => Auth::user()->id,'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k => $item)
            {
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'],2,".",""), $item['qtd']));

                $order->items()->create(['product_id' => $k,'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));
            
            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());
        }

        $categories = Category::all();

        return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
    }

    public function test(CheckoutService $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());
    }


}
