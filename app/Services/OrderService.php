<?php


namespace App\Services;


use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    public function allOrders()
    {
//        return DB::table('customers')->get();
        return Order::all();
    }

    public function storeOrder(
        string $status,
        float $total_amount,
        string $customer_id
    )
    {
        try {
            Order::create([
                'status' => $status,
                'total_amount' => crypt($total_amount),
                'customer_id' => $customer_id,
                'order_number' => self::generateOrderNumber($customer_id,Auth::user()->id),
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->route('orders')->with('success', 'Order Created Successfully.');

        } catch (\Exception $exception) {
            return redirect()->route('orders')->with('error', 'Error '.$exception->getMessage());
        }
    }

    public function updateOrder(
        $order,
        string $status,
        string $customer_id
    )
    {
        try {
            $order->update([
                $order->status => $status,
                $order->customer_id => $customer_id,
            ]);

            return view('dashboard.orders')->with('success', 'Order updated Successfully.');

        }catch (\Exception $exception){
            return redirect()->route('orders')->with('error', 'Error ' . $exception->getMessage());
        }
    }

    private static function generateOrderNumber($customer_id,$user_id){
        return $customer_id.''.$user_id.''.rand(100000,999999);
    }


}
