<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrders(){
        $orders = $this->orderService->allOrders();
        return view('dashboard.orders',compact('orders'));
    }

    public function showOrder(Order $order){
        return view('dashboard.order',compact('order'));
    }

    public function storeOrder(OrderRequest $request){

        return $this->orderService->storeOrder(
            $request->name,
            $request->date_of_birth,
            $request->email,
        );
    }

    public function updateOrder(OrderRequest $request, Order $order){
        return $this->orderService->updateOrder(
            $order,
            $request->name,
            $request->date_of_birth,
        );
    }

    public function deleteOrder(Order $order){
        $order->delete();
        return view('dashboard.orders')->with('success','Order Deleted Successfully.');
    }
}
