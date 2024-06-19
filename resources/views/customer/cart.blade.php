@extends('layouts.customerLayout')
@section('title', 'cart || furniture')

@section('content')
    <div class="top-link">
        <a href="{{route('customer.home')}}">Home > </a> 
        <a href="{{route('customer.shop')}}">Shop > </a> 
        <a style="color: black; font-weight:bold" >Cart</a>
    </div>
    @if (session('cart')) 
    <div class="test-container">
        <p class="cartlist-title">Your selection <span>{{ count((array) session('cart')) }} item(s)</span></p>


       
        <table class="cartlist-table">
            <tr class="cartlist-table-title">
                <th style="width:5%"></th>
                <th style="width:40%;
                        display:flex;
                        justify-content:left">
                    Product</th>
                <th style="width:12%">Price</th>
                <th style="width:12%">Quantity</th>
                <th style="width:10%">Total</th>
            </tr>
           
            @php $total = 0 @endphp
           
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}" class="cartlist-item">
                        <td class="actions" data-th="">

                            <div class="button-container" style="display: flex; justify-content:center;">
                                <button class="cart_remove" id=cancel>x</button>
                            </div>
                        </td>

                        <td data-th="Product" style="width:20%;">
                            <div class="row">
                                <div class="cartlist-image"><img src="{{ asset('img/products/' . $details['img']) }}"
                                        width="100" height="100" class="img-responsive" /></div>
                                <div class="cartlist-name">
                                    <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                </div>
                            </div>
                        </td>

                        <td data-th="Price">
                            <div class="price-container">
                                ${{ $details['price'] }}
                            </div>
                        </td>

                        <td data-th="Quantity">
                            <div class="input-container">
                                <input type="number" value="{{ $details['quantity'] }}" class="quantity cart_update"
                                    min="1" />
                            </div>
                        </td>

                        <td data-th="Total" class="text-center">
                            <div class="total-container">
                                ${{ $details['price'] * $details['quantity'] }}
                            </div>
                        </td>

                    </tr>
                @endforeach




        </table>
        <div class="btn-row">
            <form action="{{route('customer.checkout')}}" method="POST">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" id="checkout-live-button"class="checkout">Procced To Checkout</button>
            </form>
            <div class="sub-btn-row">
                <button class="clearbtn">Clear All</button>
                <button class="updatebtn">Update Cart</button>
            </div>
        </div>

        @else
        <div class="test-container" style="height: 50%">
            <p class="cartlist-title">Your selection <span>{{ count((array) session('cart')) }} item(s)</span></p>
    
        <table class="cartlist-table">
            <tr class="cartlist-table-title">
                <th style="width:5%"></th>
                <th style="width:40%;
                        display:flex;
                        justify-content:left">
                    Product</th>
                <th style="width:12%">Price</th>
                <th style="width:12%">Quantity</th>
                <th style="width:10%">Total</th>
            </tr>
        </table>
        </div>
        @endif

    </div>


@endsection
