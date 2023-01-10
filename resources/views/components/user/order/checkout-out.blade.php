@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('order.place-order', $order)}}">
                    @csrf
                    <!-- Checkout Form s-->
                     <div class="checkout-form">
                        <div class="row row-40">
                            <div class="col-lg-7 mb--20">
                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">Billing Address</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb--20">
                                            <label>Full Name*</label>
                                            <input type="text" placeholder="First Name" name="shipName">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Email Address*</label>
                                            <input type="email" placeholder="Email Address" name="email_address">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Phone no*</label>
                                            <input type="text" placeholder="Phone number" name="phone_number">
                                        </div>
                                        <div class="col-12 mb--20">
                                            <label>Address*</label>
                                            <input type="text" placeholder="Address" name="shipAddress">
                                        </div>
                                        <div class="col-md-6 col-12 mb--20">
                                            <label>Town/City*</label>
                                            <input type="text" placeholder="Town/City" name="shipCity">
                                        </div>
                                        <input type="number" hidden name="amount" value="{{$mount}}">
                                        <input type="text" hidden name="total" value="{{$total}}">

                                    </div>
                                </div>
                                <!-- Shipping Address -->

                                <div class="order-note-block mt--30">
                                    <label for="order-note">Order notes</label>
                                    <textarea id="order-note" cols="30" rows="10" class="order-note" name="note"
                                              placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>


                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <!-- Cart Total -->
                                    <div class="col-12">
                                        <div class="checkout-cart-total">
                                            <h2 class="checkout-title">YOUR ORDER</h2>
                                            <h4>Product <span>Total</span></h4>
                                            <ul>
                                                @foreach($books as $book)
                                                    <li><span class="left">
                                                        {{$book->title}}  <strong>X {{$book->quantity}}</strong>
                                                    </span> <span class="right">{{$book->price}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <p>Sub Total <span>{{$total}}</span></p>
                                            <p>Shipping cost<span>{{$shippingCost}}</span></p>
                                            <h4>Grand Total <span>{{$grandTotal}}</span></h4>
                                            <div class="method-notice mt--25">
                                                <article>
                                                    <h3 class="d-none sr-only">blog-article</h3>
                                                    Sorry, it seems that there are no available payment methods for
                                                    your state. Please contact us if you
                                                    require
                                                    assistance
                                                    or wish to make alternate arrangements.
                                                </article>
                                            </div>
                                            <button class="place-order w-100">Place order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection


