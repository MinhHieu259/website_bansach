@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="shop-toolbar mb--30">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="product-view-mode">
                            <a href="#" class="sorting-btn active" data-target="grid">
                                <i class="fas fa-th"></i>
                            </a>
                            <a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
                            </a>
                            <a href="#" class="sorting-btn" data-target="list "><i
                                    class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-toolbar d-none">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <!-- Product View Mode -->
                        <div class="product-view-mode">
                            <a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
                            <a href="#" class="sorting-btn" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
                            </a>
                            <a href="#" class="sorting-btn " data-target="list "><i class="fas fa-list"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-product-wrap list with-pagination row space-db--30 shop-border">
                @foreach($books as $book)
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-card card-style-list">
                            <div class="product-grid-content">
                                <div class="product-header">
                                    <a href="" class="author">
                                        {{$book->publisher->name}}
                                    </a>
                                    <h3><a href="{{ route('home.detail-book', $book)  }}">{{$book->title}}</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{url('uploads')}}/{{$book->book_avatar}}" alt="" style="width:250px; height: 250px; object-fit: contain;">
                                        <div class="hover-contents">
                                            <a href="{{ route('home.detail-book', $book)  }}" class="hover-image">
                                                <img src="{{url('uploads')}}/{{$book->book_avatar}}" alt="" style="width:250px; height: 250px; object-fit: contain;">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="{{route('order.add', $book)}}" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.html" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">{{$book->price}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

@endsection
