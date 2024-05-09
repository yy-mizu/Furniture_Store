<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>

    <div class="main-page-wrapper">
        <nav class="navbar-wrapper">
            <div class="navbar-container">

                <div class="navbar-head">
                    <img src="{{ asset('img/admin/sideMenu1.png') }}" alt="">

                    <h4>Furniture Store</h4>

                    <img src="{{ asset('img/admin/sideMenu2.png') }}" alt="">
                </div>

                <div class="navbar-body">

                    <div class="navbar-item">
                        <img src="{{ asset('img/admin/dashboard.png') }}" alt="">

                        <h5>Dashboard</h5>
                    </div>

                    <div class="navbar-item">
                        <img src="{{ asset('img/admin/products.png') }}" alt="">

                        <h5>Products</h5>
                    </div>

                    <div class="navbar-item">
                        <img src="{{ asset('img/admin/customer.png') }}" alt="">

                        <h5>Customers</h5>
                    </div>

                    <div class="navbar-item">
                        <img src="{{ asset('img/admin/order.png') }}" alt="">

                        <h5>Orders</h5>
                    </div>

                    <a href="{{ route('admin.stafflist') }}">
                        <div class="navbar-item">
                            <img src="{{ asset('img/admin/staff.png') }}" alt="">

                            <h5>Staffs</h5>
                        </div>
                    </a>

                    <div class="navbar-item">
                        <img src="{{ asset('img/admin/report.png') }}" alt="">

                        <h5>Reports</h5>
                    </div>



                </div>

            </div>
        </nav>

        <div class="admin-body-wrapper">
        
                @yield('admin-body')
   
        </div>
</body>
</div>

</html>
