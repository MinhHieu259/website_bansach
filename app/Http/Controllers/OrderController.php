<?php

namespace App\Http\Controllers;

use App\Constants\Constant;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkOut(Order $order) {
        $books = [];

        $orderItem = OrderItem::query()
            ->where('order_id', $order->id)
            ->get();
        $total = 0;
        $mount=0;

        foreach($orderItem as $item) {
            $book = $item->book;
            $book['quantity'] = $item->quantity;
            $books[] = $book;
            $mount += $item->quantity;
            $total += ($item->price * $item->quantity);
        }
        $shippingCost = $order->shipping_cost;
        $grandTotal = $total + $shippingCost;

        return view('components.user.order.checkout-out',
                compact(
                'order',
                'books',
                        'total',
                        'shippingCost',
                        'grandTotal',
                        'mount'
                ));
    }

    public function placeOrder(Request $request, Order $order) {
        $data = $request->all();
        $order->dateTimeOrder = Carbon::now()->toDateTimeString();
        $order->status = Constant::$ORDER;
        $order->update($data);
        $order->update($data);
        return view('components.user.order.order-success', [
            'messages' => 'Order Successfully!!!'
        ]);
    }
}
