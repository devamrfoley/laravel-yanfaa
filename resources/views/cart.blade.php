@extends('layouts.app')

@section('content')
    @if($cart === null)
        <!-- catg header banner section -->
        <section id="aa-catg-head-banner">
            <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
            <div class="aa-catg-head-banner-area">
                <div class="container">
                    <div class="aa-catg-head-banner-content">
                        <h2>Empty Cart</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>                   
                            <li class="active">Cart</li>
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
                        <a href="{{ route('products') }}"></a>
                    </div>
                </div>
                </div>
            </div>
        </section>
    @else
        <!-- catg header banner section -->
        <section id="aa-catg-head-banner">
            <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
            <div class="aa-catg-head-banner-area">
                <div class="container">
                    <div class="aa-catg-head-banner-content">
                        <h2>Cart Page</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>                   
                            <li class="active">Cart</li>
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
                        <div class="cart-view-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart->items as $key => $item)
                                            <tr>
                                                <td>
                                                    <form action="{{ route('removeCartItem', $key) }}" method="POST">    
                                                        @csrf
                                                        @method('delete')
                                                        <button class="remove"><fa class="fa fa-close"></fa></button>
                                                    </form>
                                                </td>
                                                <td><a href="/products/{{ $key }}"><img src="{{ asset('storage/images/'.$item['image']) }}" alt="img"></a></td>
                                                <td><a class="aa-cart-title" href="/products/{{ $key }}">{{ $item['title'] }}</a></td>
                                                <td>${{ $item['price'] }}</td>
                                                <td>
                                                    <form action="{{ route('editCartItem', $key) }}" method="POST">
                                                        @csrf
                                                        @method('patch')    
                                                        <input class="aa-cart-quantity" name="quantity" type="number" value="{{ $item['quantity'] }}" />
                                                    </form>
                                                </td>
                                                <td>${{ $item['total_price'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                            <h4>Cart Totals</h4>
                            <table class="aa-totals-table">
                                <tbody>
                                <tr>
                                    <th>Total Items</th>
                                    <td>{{ $cart->totalItems }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>${{ $cart->totalPrice }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('emptyCart') }}" method="POST"> 
                                @csrf
                                @method('delete')                     
                                <button class="aa-cartbox-checkout aa-primary-btn">Empty Cart?</button>
                            </form>
                            <a href="" class="aa-cart-view-btn">Proced to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- / Cart view section -->
    @endif
@endsection