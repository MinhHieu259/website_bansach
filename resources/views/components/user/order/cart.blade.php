@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <!-- Cart Page Start -->
    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{route('order.update')}}" class="" >
                            @csrf
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--40">
                                <table class="table">
                                    <!-- Head Row -->
                                    <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="cartTbody">

                                        <!-- Discount Row  -->

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2">
            <div class="container">
                <div class="row">

                    <!-- Cart Summary -->
                    <div class="col-lg-12 col-12 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4><span>Cart Summary</span></h4>
                                <p>Sub Total <span class="text-primary">{{$total}}</span></p>
                                <p>Shipping Cost <span class="text-primary">{{$order->shipping_cost}}</span></p>
                                <h2>Grand Total <span class="text-primary">{{$total + $order->shipping_cost}}</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <a href="{{route('order.checkOut', $order)}}" class="checkout-btn c-btn btn--primary">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Cart Page End -->
@endsection

@push('scripts')
<script>
    let orderItems = <?php echo $orderItems ?>;
    let order = <?php echo $order ?>;

    let cartInput = undefined;

    let cartTbody = document.getElementById('cartTbody');
    function render(items) {
        let listTable = items.map(item => {
            return `
           <!-- Product Row -->
                    <tr>
                        <td class="pro-remove"><a href="/order/deleteItemCart/${item['id']}"><i class="far fa-trash-alt"></i></a>
                        </td>
                        <td class="pro-thumbnail"><a href="#"><img
                            src="/uploads/${item['book']['book_avatar']}" alt="Product"></a></td>
                        <td class="pro-title"><a href="#">${item['book']['title']}</a></td>
                        <td class="pro-price"><span>${item['price']}</span></td>
                        <td class="pro-quantity">
                            <div class="pro-qty">
                                <div class="count-input-block">
                                    <input type="number"
                                           class="form-control text-center"
                                           name=""
                                           onchange="handleChangerQuantity(this, ${item['id']})"
                                           value="${item['quantity']}">
                                </div>
                            </div>
                        </td>
                        <td class="pro-subtotal"><span>${item['price'] * item['quantity']}</span></td>
                    </tr>
    `
        })
        listTable.push(
            `
                <tr>
                    <td colspan="6" class="actions">
                        <div class="update-block text-right">
                            <input type="submit" class="btn btn-outlined" name="update_cart"
                                   value="Update cart">
                            <input type="hidden" id="_wpnonce" name="_wpnonce"
                                   value="05741b501f">
                            <input type="hidden"
                                   name="_wp_http_referer" value="/petmark/cart/">
                            <input type="text" hidden name="cart" id="cartInput" value="">
                        </div>
                    </td>
                </tr>
            `
        );


        cartTbody.innerHTML = listTable.join(' ') + cartTbody.innerHTML;
    }
    render(orderItems);
    cartInput = document.getElementById('cartInput');
    cartInput.value = JSON.stringify(orderItems);
    function handleChangerQuantity(input, id) {
        for(let item of orderItems) {
            if(item['id'] === id) {
                item['quantity'] = input.value * 1;
                break;
            }
        }
        cartInput.value = JSON.stringify(orderItems);
    }

    function handleRemoveItem(id) {
        for(let index in orderItems) {
            orderItems.splice(index, 1)
        }
        cartInput.value = JSON.stringify(orderItems);
        render(orderItems);
    }


</script>

@endpush

