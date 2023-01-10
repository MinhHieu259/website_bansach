@extends('layouts.admin')
@section('title', 'Show Order')
@section('content')
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="authorName">Ship name</label>
                                    <input
                                        type="text"
                                        name="Ship Name"
                                        value="{{$order->shipName}}"
                                        disabled
                                        class="form-control"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="authorName">Ship Address</label>
                                    <input
                                        type="text"
                                        name="Ship Name"
                                        value="{{$order->shipAddress}}"
                                        disabled
                                        class="form-control"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="authorName">Phone Number</label>
                                    <input
                                        type="text"
                                        name="Ship Name"
                                        value="{{$order->phone_number}}"
                                        disabled
                                        class="form-control"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="authorName">Ship City</label>
                                    <input
                                        type="text"
                                        name="Ship Name"
                                        value="{{$order->shipCity}}"
                                        disabled
                                        class="form-control"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="authorName">Date Time Order</label>
                                    <input
                                        type="text"
                                        name="Ship Name"
                                        value="{{$order->dateTimeOrder}}"
                                        disabled
                                        class="form-control"
                                    >
                                </div>
                                <div class="d-flex justify-content-around">
                                    <div><strong>Book</strong></div>
                                    <div><strong>Quantity</strong></div>
                                    <div><strong>Total</strong></div>
                                </div>
                                @foreach($books as $book)
                                    <div class="form-group">

                                        <div class="d-flex justify-content-around">
                                            <input  type="text"  style="width: 250px"  name="Ship Name"  value="{{$book->title}}"  disabled  class="form-control">
                                            <input type="text" name="Ship Name" style="width: 250px" value="{{$book->quantity}}" disabled class="form-control">
                                            <input type="text" name="Ship Name" style="width: 250px" value="{{$book->quantity * $book->price}}" disabled class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-around">
                                    <div><strong>Total: {{$total}} </strong></div>
                                </div>
                                <div class="d-flex justify-content-around">

                                    <div><strong>Shipping cost: {{$shippingCost}}</strong></div>
                                </div>
                                <div class="d-flex justify-content-around">
                                  
                                    <div><strong>Grand total: {{$grandTotal}}</strong></div>
                                </div>

                                <div class="">
                                    <a href="{{route('admin.orders')}}" class="btn btn-primary" >
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
@endsection
