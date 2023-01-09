@extends('layouts.admin')
@section('title', 'Manage Books')
@section('content')
    <div>
        {{--    <x-loading-indicator/>--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Books</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Books</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
{{--                @if(session()->has('message'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        <strong><i class="fa fa-check-circle mr-1"></i></strong> {{session('message')}}--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <a href="{{route('admin.books.create')}}">
                                    <button class="btn btn-primary">Add New Book</button>
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
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Publisher</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($books as $index=>$book)
                                        <tr>
                                            <th scope="row">{{$book->id}}</th>
                                            <th>
                                                <img src="{{url('/uploads')}}/{{$book->book_avatar}}"  width="70" height="70" alt="" style="object-fit: cover">
                                            </th>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->price }}</td>
                                            <td>{{ $book->publisher->name }}</td>
                                            <td>{{ $book->category->name }}</td>
                                            <td>

                                                <form action="{{route('admin.books.destroy', $book)}}" method="POST">
                                                    <a href="{{route('admin.books.edit', $book)}}">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7">
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
