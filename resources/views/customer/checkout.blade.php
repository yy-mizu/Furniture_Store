@extends('layouts.customerLayout')
@section('title','checkout || furniture')
@section('content')
<div class="top-link">
        <a href="">Home > </a> Checkout
    </div>
    <div class="container">
        <div class="detail">
            <b>Billing Details</b>
            <form action="">
                <div><label for="firstName" >First name <span>*</span> </label></div>
                <div><input type="text" id="firstName"></div>
                <div><label for="lastName" id="lastName">Last name <span>*</span> </label></div>
                <div><input type="text" id="lastName" required></div>
                <div><label for="country" id="lastName">Country / Region <span>*</span> </label>
                </div>
                <div>
                    <select type="text" id="country" required>
                        <option value="">United Kingdom</option>
                        <option value="">Singapore</option>
                        <option value="">Japan</option>
                    </select>
                </div>
                <div><label for="address">Address  <span>*</span> </label></div>
                <div><textarea name="" id="address" cols="21" rows="5"></textarea></div>
                <div><label for="email">Email <span>*</span> </label></div>
                <div><input type="email" id="email"></div>
                <div><label for="phno">Phone<span>*</span> </label></div>
                <div><input type="number" id="phno"></div>
            </form>

        </div>
        <div class="order">
            
            <div class="order-detail">
                <div class="title"><b>Your Order</b></div>
                <div>PRODUCT</div>
                <div>SUBTOTAL</div>
                <div>Armchair Black Leather x 1</div>
                <div>$220.00</div>
                <div>Subtotal</div>
                <div>$220.00</div>
                <div>Shipping</div>
                <div></div>
                <div class="check">
                    <input type="radio" id="radio"> <label for="radio">Check payments</label>
                </div>
                <div class="card">
                    <img src="{{asset('image/customer/294654_visa_icon.png')}}" alt="VISA">
                    <img src="{{asset('image/customer/206680_master_method_card_payment_icon.png')}}" alt="MASTER">
                    <img src="{{asset('image/customer/mpu.png')}}" alt="MPU">
                </div>
                <div class="button"><button>Place Order</button></div>

            </div>
        </div>
    </div>
@endsection
