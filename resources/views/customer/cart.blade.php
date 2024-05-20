@extends('layouts.customerLayout')
@section('title','cart || furniture')

@section('content')
<div class="top-link">
        <a href="">Home > </a> Shopping cart
    </div>
    <b class="title">Your selection <span>(1 item)</span></b>
    <div class="test-container">
    
        <div class="row">
            <div class="product">Product</div>
            <div class="price">Price</div>
            <div>Quantity</div>
            <div class="total">Total</div>
        </div>
        <div class="row">
            <button value="cancel" id="cancel">x</button>
            <div class="product-image-container"><img src="{{asset('/image/customer/bed.png')}}" alt="product" width="100%" height=""></div>
            <div>Modern Deluxe Bed</div>
            <div >$100.00</div>
            <div><input class="quantity-input" type="number" value="1"></input></div>
            <div class="total">$110</div>
        </div>
        <div class="row">
            <button class="checkout">Procced To Checkout</button>
            <button class="clearbtn">Clear All</button>
            <button class="updatebtn">Update Cart</button>
           
        </div>
    </div>


@endsection