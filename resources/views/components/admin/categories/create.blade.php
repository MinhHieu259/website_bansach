@extends('layouts.admin')
@section('title', 'Create Category')
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
                        <form method="post" action="{{route('admin.categories.store')}}">
                            @csrf
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="authorName">Category Name</label>
                                        <input
                                               type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               id="authorName"
                                               placeholder="Enter category name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <a href="{{route('admin.categories')}}" class="btn btn-secondary" ><i
                                                class="fa fa-times mr-1"></i>
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"> Save</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
@endsection
