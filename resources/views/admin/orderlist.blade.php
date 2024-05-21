@extends('layouts.adminLayout')

{{-- @dd($orderlist) --}}
@section('admin-body')
    <div class="order-page">

        <div class="order-page-title">
            <h4>Order List</h4>

            
        </div>

        <div class="order-table-container">
            <table class="order-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">Order ID</th>
                    <th>Product Name</th>
                    <th>Buyer Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Status</th>
                    
                  


                </tr>


                @foreach ($orderlist as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->productname }}</td>
                        <td>{{ $order->buyer_name }}</td>
                        <td>{{ $order->date}}</td>
                        <td>{{ $order->order_quantity}}</td>
                        <td style="align-items: center;
                                    vertical-align:middle;">
                           
                            
                            @if ( $order->status == 0)
                            <span style="color: green;
                                        font-size :40px">&#183</span> 
                                        
                                   <p style="display: inline-block">Delivered</p>
                        @elseif( $order->status == 1)
                             <span  style="color: yellow;
                             font-size :40px">
                             &#183
                            </span> 
                            <p style="display: inline-block">Pending</p>
                        @else
                            <span style="color: red;
                            font-size :40px">&#183</span> 
                             <p style="display: inline-block">Canceled</p>
                        @endif</td>
                        

                       
                    </tr>
                @endforeach

            </table>

            <div class="pagination">
                {{-- {{$stafflist->withQueryString()->links('pagination::bootstrap-5') }} --}}
            </div>
        </div>
    </div>
@endsection

@section('admin-body-navbar-title')
    STAFF MANAGEMENT
@endsection
