@extends('layouts.adminLayout')
@section('admin-body-navbar-title' , 'Dashboard')


@section('admin-body')
    <div class="dashboard-page">


        <div class="dashboard-wrapper">

            <div class="dashboardrow one">
                <div class="box">
                    <div class="content">
                        <p>Todays Revenue</p>
                        <h1>$8.2K</h1>
                        <p>Availabale to payout</p>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <p>Todays Revenue</p>
                        <h1>$8.2K</h1>
                        <p>Availabale to payout</p>
                    </div>
                </div>

                <div class="box">
                    <div class="content">
                        <p>Todays Revenue</p>
                        <h1>$8.2K</h1>
                        <p>Availabale to payout</p>
                    </div>
                </div>
            </div>

            <div class="dashboardrow two">
                <div class="bar-chart">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                                datasets: [{
                                        label: 'Monthly Sales',
                                        data: [18000, 22000, 19000, 12000, 22000, 25000, 22000, 22000, 22000],
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color for profit bars
                                        borderColor: 'rgba(75, 192, 192, 1)', // Border color for profit bars
                                        borderWidth: 1
                                    }
                                    // },
                                    // {
                                    //     label: 'Loss',
                                    //     data: [11000, 10000, 9000, 2000, 19000, 5000, 2000, 2000, 1500],
                                    //     backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color for loss bars
                                    //     borderColor: 'rgba(255, 99, 132, 1)', // Border color for loss bars
                                    //     borderWidth: 1
                                    // }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </div>

                <div class="pie-chart">
                    <canvas id="myPie" style="width:100%;max-width:600px"></canvas>
                    <script>
                        var ctx = document.getElementById('myPie').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['One time', 'Account'],
                                datasets: [{
                                    data: [ 500 , 350 ],
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)', // Color for 'One time'
                                        'rgba(75, 192, 192, 0.2)' // Color for 'Account'
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)', // Border color for 'One time'
                                        'rgba(75, 192, 192, 1)' // Border color for 'Account'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                legend: {
                                    position: 'bottom',
                                },
                                title: {
                                    display: true,
                                    text: 'Monthly Order'
                                }
                            }
                        });
                    </script>
                </div>

            </div>

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
        </div>
    @endsection
