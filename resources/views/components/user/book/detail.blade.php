@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

<div class="container">
    <div class="row  mb--60">
        <div class="col-lg-5 mb--30">
            <!-- Product Details Slider Big Image-->
            <div class="product-details-slider sb-slick-slider arrow-type-two" style="height: 445px;width: 350px; overflow:hidden" data-slick-setting='{
  "slidesToShow": 1,
  "arrows": false,
  "fade": true,
  "draggable": false,
  "swipe": false,
  "asNavFor": ".product-slider-nav"
  }'>

                @foreach ($book->images as $image)
                    <div class="single-slide">
                        <img src="{{url('/uploads')}}/{{$image->image}}" alt="" style="height: 100%; object-fit:cover">
                    </div>
                @endforeach
            </div>
            <!-- Product Details Slider Nav -->
            <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
"infinite":true,
  "autoplay": true,
  "autoplaySpeed": 8000,
  "slidesToShow": 4,
  "arrows": true,
  "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
  "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
  "asNavFor": ".product-details-slider",
  "focusOnSelect": true
  }'>
            @foreach ($book->images as $image)
                <div class="single-slide">
                    <img src="{{url('/uploads')}}/{{$image->image}}" alt="">
                </div>
            @endforeach
            </div>
        </div>
        <div class="col-lg-7">
            <div class="product-details-info pl-lg--30 ">
                <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                <h3 class="product-title">{{ $book->title }}</h3>
                <ul class="list-unstyled">
                    <li>Price <span class="list-value"> {{ $book->price }}</span></li>
{{--                    <li>Brands: <a href="#" class="list-value font-weight-bold"> {{$book->publisher->id }}</a></li>--}}
{{--                    <li>Product Code: <span class="list-value"> {{ $book->id }}</span></li>--}}
{{--                    <li>Reward Points: <span class="list-value"> 200</span></li>--}}
{{--                    <li>Availability: <span class="list-value"> In Stock</span></li>--}}
                </ul>
{{--                <div class="price-block">--}}
{{--                    <span class="price-new">{{ $book->price }}$</span>--}}
{{--                    <del class="price-old">£91.86</del>--}}
{{--                </div>--}}
                <div class="rating-widget">
                    <div class="rating-block">
                        <span class="fas fa-star star_on"></span>
                        <span class="fas fa-star star_on"></span>
                        <span class="fas fa-star star_on"></span>
                        <span class="fas fa-star star_on"></span>
                        <span class="fas fa-star "></span>
                    </div>
                    <div class="review-widget">
                        <a href="">(1 Reviews)</a> <span>|</span>
                        <a href="">Write a review</a>
                    </div>
                </div>

                <div class="add-to-cart-row">
{{--                    <div class="count-input-block">--}}
{{--                        <span class="widget-label">Qty</span>--}}
{{--                        <input type="number" class="form-control text-center" value="1">--}}
{{--                    </div>--}}
                    <div class="add-cart-btn">
                        <a href="{{route('order.add', $book)}}" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
                            Cart</a>
                    </div>
                </div>
                <div class="compare-wishlist-row">
                    <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                    <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                </div>
            </div>
        </div>
    </div>
    <div class="sb-custom-tab review-tab section-padding">
        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                    aria-controls="tab-1" aria-selected="true">
                    DESCRIPTION
                </a>
            </li>
        </ul>
        <div class="tab-content space-db--20" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                <article class="review-article">
                    <h1 class="sr-only">Tab Article</h1>
                    {{ print($book->desc) }}
                </article>
            </div>
            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                <div class="review-wrapper">
                    <h2 class="title-lg mb--20">1 REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                    <div class="review-comment mb--20">
                        <div class="avatar">
                            <img src="image/icon/author-logo.png" alt="">
                        </div>
                        <div class="text">
                            <div class="rating-block mb--15">
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline"></span>
                                <span class="ion-android-star-outline"></span>
                            </div>
                            <h6 class="author">ADMIN – <span class="font-weight-400">March 23, 2015</span>
                            </h6>
                            <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio
                                quis mi.</p>
                        </div>
                    </div>
                    <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                    <div class="rating-row pt-2">
                        <p class="d-block">Your Rating</p>
                        <span class="rating-widget-block">
                            <input type="radio" name="star" id="star1">
                            <label for="star1"></label>
                            <input type="radio" name="star" id="star2">
                            <label for="star2"></label>
                            <input type="radio" name="star" id="star3">
                            <label for="star3"></label>
                            <input type="radio" name="star" id="star4">
                            <label for="star4"></label>
                            <input type="radio" name="star" id="star5">
                            <label for="star5"></label>
                        </span>
                        <form action="./" class="mt--15 site-form ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Comment</label>
                                        <textarea name="message" id="message" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="submit-btn">
                                        <a href="#" class="btn btn-black">Post Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
