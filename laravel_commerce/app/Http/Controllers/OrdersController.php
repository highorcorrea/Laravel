<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrdersController extends Controller
{
    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    public function edit($id)
    {
        $order = $this->orderModel->find($id);

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->orderModel->find($id)->update($request->all());

        return redirect()->route('orders');
    }
}
