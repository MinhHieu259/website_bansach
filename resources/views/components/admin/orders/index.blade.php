@extends('layouts.admin')
@section('title', 'Manage Categories')
@section('content')
    <div>
        {{--    <x-loading-indicator/>--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <a href="{{route('admin.categories.create')}}">
                                    <button class="btn btn-primary">Add New Category</button>
                                </a>

                            </div>

                            <div>
                                <a href="{{route('admin.list.status', 1)}}">
                                    <button class="btn btn-info">ORDER</button>
                                </a>
                                <a href="{{route('admin.list.status', 2)}}">
                                    <button class="btn btn-primary">ACCEPT</button>
                                </a>
                                <a href="{{route('admin.list.status', 3)}}">
                                    <button class="btn btn-warning">SHIP</button>
                                </a>
                                <a href="{{route('admin.list.status', 4)}}">
                                    <button class="btn btn-success">COMPLETE</button>
                                </a>
                                <a href="{{route('admin.list.status', 5)}}">
                                    <button class="btn btn-danger">CANCEL</button>
                                </a>

                            </div>
                            {{--                            <x-search-input wire:model="searchTerm"/>--}}
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">Ship Name</th>
                                        <th scope="col">Ship Address</th>
                                        <th scope="col">Date Time Order</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($orders as $index=>$order)
                                        <tr>
                                            <th scope="row">{{$index}}</th>
                                            <td>{{ $order->shipName }}</td>
                                            <td>{{ $order->shipAddress }}</td>
                                            <td>{{ $order->dateTimeOrder }}</td>
                                            <td>{{ $order->phone_number }}</td>
                                            <td>{{ $order->email_address }}</td>
                                            <td>
                                                <select class="form-control" onchange="handleSelect(this, {{$order}})">
                                                    <option value="1" {{$order->status == 1 ? 'selected' : ''}}>ORDER</option>
                                                    <option value="2" {{$order->status == 2 ? 'selected' : ''}}>ACCEPT</option>
                                                    <option value="3" {{$order->status == 3 ? 'selected' : ''}}>SHIP</option>
                                                    <option value="4" {{$order->status == 4 ? 'selected' : ''}}>COMPLETE</option>
                                                    <option value="5" {{$order->status == 5 ? 'selected' : ''}}>CANCEL</option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{route('admin.orders.show', $order)}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">
                                                <p class="mt-2">No results found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                {{--                                {{ $categories ->links() }}--}}
                            </div>
                        </div>


                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <!-- Modal -->
    </div>
@endsection
@push('scripts')
<script>
    function handleSelect(selection, order) {
        order['status'] = selection.value;
        window.location.href = '{{url('/admin/orders/update-status/')}}/' +  JSON.stringify(order)
    }
</script>
@endpush
