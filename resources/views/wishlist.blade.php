@extends('layouts.app')

@section('content')
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Wishlist Page</h2>
                <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>                   
                <li class="active">Wishlist</li>
                </ol>
            </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- Cart view section -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                <div class="cart-view-table aa-wishlist-table">
                    @if($wishlist)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wishlist as $wl)
                                        @php $product = $wl->product @endphp
                                        <tr>
                                            <td>
                                                <form action="{{ route('removeWishlistItem', $product->id) }}" method="POST">    
                                                    @csrf
                                                    @method('delete')
                                                    <button class="remove"><fa class="fa fa-close"></fa></button>
                                                </form>
                                            </td>
                                            <td><a href="{{ $product->path() }}"><img src="{{ asset('storage/images/'.$product->image) }}" alt="img"></a></td>
                                            <td><a class="aa-cart-title" href="{{ $product->path() }}">{{ $product->title }}</a></td>
                                            <td>${{ $product->price }}</td>
                                            <td>{{ $product->stock == 0 ? "Out of Stock" : "In Stock" }}</td>
                                            <td><a href="{{ route('addToCart', $product->id) }}" class="aa-add-to-cart-btn">Add To Cart</a></td>
                                        </tr>  
                                    @endforeach                
                                </tbody>
                            </table>
                        </div>    

                        <div class="text-center">
                            <form action="{{ route('emptyWishlist') }}" method="POST">
                                @csrf 
                                @method('delete')
                                <button class="aa-browse-btn">Empty Wishlist</button>
                            </form>

                            <form action="{{ route('addAllToCart') }}" method="POST">
                                @csrf
                                <button class="aa-primary-btn">Add all to cart</button>
                            </form>
                        </div>
                    @else
                        <div class="text-center">
                            <h3>No products on wishlist yet</h3>
                            <a href="{{ route('products') }}">All Products</a>
                        </div>
                    @endif
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection