@extends('layouts.adminLayout')

{{-- @dd($orderstatus) --}}
@section('admin-body')
    <div class="order-page">

        <div class="order-page-title">
            <div class="title-container">
                <h4>Order List</h4>
            </div>
            

            <div class="search-form-wrapper">
                <form action="{{route('admin.orderlist.search')}}" class="search-form" method="POST">
                    @csrf
                    <input type="text" name="search">
                    <button type="submit">Search</button>
                </form>
            </div>

            <div class="sort-form-wrapper">
                <form action="{{route('admin.orderlist.filter')}}" class="sort-form" method="GET">

                    <div class="sort-form-field">
                        <label for="date">Date:</label>
                        <input type="date" name="date" value="{{Request::get('date')??  '' }}">
                    </div>

                    <div class="sort-form-field">
                        <label for="status">Status:</label>

                        <select name="status" id="">
                            <option value="" {{Request::get('status') == 'All' ? 'selected' : ''}}>All</option>
                            <option value="0" {{Request::get('status') == '0' ? 'selected' : ''}}>Completed</option>
                            <option value="1" {{Request::get('status') == '1' ? 'selected' : ''}}>Pending</option>
                            <option value="2" {{Request::get('status') == '2' ? 'selected' : ''}}>Canceled</option>
                        </select>
                    </div>

                    <div class="sort-form-field">
                        <label for="status">Sort By:</label>

                        <select name="sort" id="">
                            <option value="latest"{{Request::get('sort') == 'latest' ? 'selected' : ''}}>Latest First</option>
                            <option value="oldest"{{Request::get('sort') == 'oldest' ? 'selected' : ''}}>Oldest First</option>
                        </select>
                    </div>

                    <button type="submit">Filter</button>
                    
                </form>
            </div>

        </div>

        <div class="order-table-container">
            <table class="order-table">
                <tr>
                    <th style=" border-radius: 10px 0px 0px 10px;">Order ID</th>
                    <th>Product Name</th>
                    <th>Buyer Name</th>
                    <th>Date</th>
                    {{-- <th>Amount</th> --}}
                    <th style="border-radius: 0px 10px 10px 0px;" colspan="2">Status</th>




                </tr>


                @foreach ($orderlist as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product_details}}</td>

                        {{-- <td>
                            @foreach ($orderlist as $order)
                            {{$order->productname }}@if (!$loop->last), @endif
                        @endforeach
                        </td> --}}

                        <td>{{ $order->buyer_name }}</td>
                        <td>{{ $order->date }}</td>
                        {{-- <td>{{ $order->order_quantity }}</td> --}}
                        {{-- <td style="align-items: center;
                                    vertical-align:middle;">
                           
                            
                            @if ($order->status == 0)
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
                        @endif</td> --}}
                        <td style="align-items: center; vertical-align: middle;">
                            {{--  --}}
                            <form action="{{ route('order.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <!-- Dropdown to select new status -->
                                <select name="status" onchange="this.form.submit()">

                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>
                                        <span style="color: green;
                        font-size :40px">&#183
                                        </span> Delivered
                                    </option>
                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>
                                        <span style="color: yellow;
                             font-size :40px">
                                            &#183
                                        </span> Pending
                                    </option>
                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}> <span
                                            style="color: red;
                                        font-size :40px">&#183</span>
                                        Canceled</option>
                                </select>
                            </form>
                            <!-- End form -->
                        </td>



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
