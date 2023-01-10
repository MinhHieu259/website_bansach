<?php

namespace App\Http\Controllers\Admin;

use App\Constants\Constant;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::query()
            ->where('status', Constant::$ORDER)
            ->get();
        return view('components.admin.orders.index', compact('orders'));
    }

    public function show(Order $order) {
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


        return view('components.admin.orders.show',
            compact(
                'order',
                'books',
                'total',
                'shippingCost',
                'grandTotal',
                'mount'
            ));
    }

    public function handleStatus($status) {
        $orders = Order::query()
            ->where('status', $status)
            ->get();
        return view('components.admin.orders.index', compact('orders'));

    }

    public function updateStatus($order) {
        $order = json_decode($order);
        $newOrder = Order::find($order->id);
        $newOrder->status = $order->status;
        $newOrder->update();

        return redirect()->route('admin.orders');
    }
}
