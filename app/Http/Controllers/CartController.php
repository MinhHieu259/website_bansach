<?php

namespace App\Http\Controllers;

use App\Constants\Constant;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $order = Order::query()
            ->where('user_id', Auth::user()->id)
            ->where('status', Constant::$CART)
            ->first();
        $orderItems = OrderItem::query()
            ->where('order_id', $order->id)
            ->get();
        $total = 0;
        foreach ($orderItems as $item) {
            $item['book'] = $item->book;
            $total += ($item['price'] * $item['quantity'] );
        }

        return view('components.user.order.cart',
                compact('orderItems', 'order', 'total'));
    }

    public function addToCart($id) {
        $book = Book::find($id);
        // check user older contain in db
        $userOlder = Order::query()
            ->where('user_id', Auth::user()->id)
            ->where('status', Constant::$CART)
            ->get();
        if($userOlder->isEmpty()) {
            $userOlder = Order::create([
                'user_id' => Auth::user()->id,
                'amount' => 0,
                'total' => 0,
                'dateTimeOrder' => Carbon::now()->toDateTimeString(),
                'status' => Constant::$CART
            ]);
        } else {
            $userOlder = $userOlder[0];
        }
        // check book in older item
        $olderItem = OrderItem::query()
            ->where('order_id', $userOlder->id)
            ->where('book_id', $id)->get();

        if(!$olderItem->isEmpty()) {
            $olderItem = $olderItem[0];
            $olderItem->quantity += 1;
            $olderItem->update();
        } else {
            $olderItem = new OrderItem();
            $olderItem->order_id = $userOlder->id;
            $olderItem->book_id = $id;
            $olderItem->price = $book->price;
            $olderItem->quantity = 1;
            $olderItem->save();
        }
        return redirect()->route('cart');

    }

    public function updateCart(Request $request) {
       $cart = json_decode($request->cart);
       if(!empty($cart)) {
           foreach ($cart as $item) {
               $orderItem = OrderItem::find($item->id);
               if($item->quantity > 0) {
                   $orderItem->quantity = $item->quantity;
                   $orderItem->update();
               } else {
                   $orderItem->delete();
               }
           }
       }
       return redirect()->route('cart');
    }

    public function delete($id) {
        $orderItem = OrderItem::find($id);
        if($orderItem) {
            $orderItem->delete();
        }

        return redirect()->route('cart');

    }
}
