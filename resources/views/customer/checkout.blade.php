@extends('layouts.customerLayout')
@section('title','checkout || furniture')
@section('content')
<div class="top-link">
        <a href="">Home > </a> Checkout
    </div>
    <div class="container">
        <div class="billing-detail">
            <b style="margin-bottom: 40px">Billing Details</b>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><span style="color: red">{{ $error }}</span></li>
                    @endforeach 
                </ul>
            </div>
        @endif
            <form action="{{route('customer.checkout.process')}}" class="checkout-form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                @csrf

                @if (auth('customer')->user() != null)
                <input type="hidden" value="{{session('customer_id')}}" name="id">
                @endif
                <div class="input-field">
                    <label for="name">Name <span>*</span></label>
                    <input type="name" name="name" required>
                </div>

                <div class="input-field">
                    <label for="phone">Phone <span>*</span></label>
                    <input type="number" name="phone"required>
                </div>

                <div class="input-field">
                    <label for="email">Email <span>*</span></label>
                    <input type="text" name="email"required>
                </div>

                <div class="input-field">
                    <label for="address">Address to Deliver <span>*</span></label>
                    <textarea type="text" name="address"required></textarea>
                </div>

                <div class="input-field">
                    <label for="">Payment Method <span>*</span></label>
                    <select type="text" id="method" name="method" required>
                        <option value="online" selected>Online Payment</option>
                        <option value="cod">Cash On Delivery</option>
                    </select>
                </div>
                <div class="button"><button type="submit">
                    
                    Place Order
                
                </button></div>

            </form>

        </div>
        <div class="order">
            
            <div class="order-detail">
                <div class="title"><b>Your Order</b></div>
                {{-- 
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
                    <img src="{{asset('img/customer/294654_visa_icon.png')}}" alt="VISA">
                    <img src="{{asset('img/customer/206680_master_method_card_payment_icon.png')}}" alt="MASTER">
                    <img src="{{asset('img/customer/mpu.png')}}" alt="MPU">
                </div> --}}

            <table style="border-collapse:collapse">

                <tr style="border-bottom: 0.5px solid black; mar">
                    <th>Product</th>
                    <th>Subtotal</th>
                </tr>

                @php $total = 0 @endphp
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}" class="checkout-item">
                    <td>{{ $details['product_name'] }} <b>x</b>{{ $details['quantity'] }} </td>
                    <td>{{$details['price'] * $details['quantity']}}</td>
                </tr>
                @endforeach
            </table>
               
            </div>
        </div>
    </div>
@endsection
